<?php

namespace App\tools;

use App\AmoCurl;
use App\Contracts\BaseEntity;
use App\Helpers\Token;

class Auth
{
    public function __construct(AmoCurl $amoclient)
    {
        $this->amoclient=$amoclient;
    }

    public function authorization_code(string $code)
    {
        $data = [
            'client_id' => $this->amoclient->client_id,
            'client_secret' => $this->amoclient->secret_key,
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $this->amoclient->redirect_uri,
        ];

      Token::setToken($this->amoclient->request('POST', $this->amoclient->url . 'oauth2/access_token',json_decode($data)));
    }

    public function refresh_token()
    {
        $data = [
            'client_id' => $this->amoclient->client_id,
            'client_secret' => $this->amoclient->secret_key,
            'grant_type' => 'refresh_token',
            'refresh_token' => Token::getToken()['refresh_token'],
            'redirect_uri' => $this->amoclient->redirect_uri,
        ];
        Token::setToken($this->amoclient->request('POST','https://' . $this->amoclient->basedomain . '.amocrm.ru/oauth2/access_token',json_decode($data)));
    }

    public function getHeader(): array
    {

        if(isset(Token::getToken()['code'])){
           return ['Content-Type:application/json'];
        } elseif (isset(Token::getToken()['access_token'])){
            if(time()>Token::getToken()['expires_in']){
                return ['Content-Type:application/json'];
            }
            return ['Content-Type:application/json','Authorization:Bearer '.Token::getToken()['access_token']];
        }else{
            throw new \Exception('Не понятно что в файле, ошибка чтения файла');
            die();
        }
    }

}