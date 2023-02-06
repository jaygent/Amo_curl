<?php

namespace App;

use App\Helpers\Token;
use App\tools\Auth;
use Exception;

class AmoCurl
{
    public string $url;

    public string $client_id;
    public string $secret_key;
    public string $redirect_uri;

    public string $access_token;


    public Auth $auth;

    public $leads;

    public function __construct($basedomain)
    {
        $this->url = 'https://'.$basedomain.'.amocrm.ru/';
        $this->client_id = getenv('Client_id');
        $this->secret_key = getenv('Secret_key');
        $this->redirect_uri = getenv('Redirect_uri');

        $this->auth = new Auth($this);
    }

    public function request($method, $link, $data = [])
    {
        if(isset(Token::getToken()['code'])){
           $this->auth->authorization_code(Token::getToken()['code']);
        }elseif(time()>Token::getToken()['expires_in']){
            $this->auth->refresh_token();
        }
        try{
            $header=$this->auth->getHeader();
        }catch (Exception $e){
            echo $e->getMessage();
            die();
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-oAuth-client/1.0');
        curl_setopt($curl, CURLOPT_URL, $link);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

        $response = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $curlErrors = curl_error($curl);

        curl_close($curl);
        $errors = [
            400 => 'Bad request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not found',
            500 => 'Internal server error',
            502 => 'Bad gateway',
            503 => 'Service unavailable',
        ];
        try {
            /** Если код ответа не успешный - возвращаем сообщение об ошибке  */
            if ($code < 200 || $code > 204) {
                throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
            }
        } catch (Exception $e) {
            die('Ошибка: '.$e->getMessage().PHP_EOL.'Код ошибки: '.$e->getCode());
        }
        return $response;
    }


}