<?php

namespace App;

class Amochat
{
    public string $url;
    protected string $secret;
    public string $title;
    public string $account_id;
    public string $scope_id;

    public function __construct($account_id,$title,$secret,$path)
    {
        $this->url="https://amojo.amocrm.ru";
        $this->account_id=$account_id;
        $this->secret=$secret;
        $this->title=$title;
    }

    public function connect($data,$channel_id)
    {
        $this->scope_id=json_decode($this->request(
            'POST',
            '/v2/origin/custom/'.$channel_id.'/connect',
            $data
        ),true)['scope_id'];
    }

    public function disconnect($data,$channel_id)
    {
        return $this->request(
            'DELETE',
            '/v2/origin/custom/'.$channel_id.'/disconnect',
            $data
        );
    }

    public function addchats($data)
    {
        return $this->request(
            'POST',
            '/v2/origin/custom/'.$this->scope_id.'/chats',
            $data
        );
    }
    public function sendOrImportChats($data)
    {
        return $this->request(
            'POST',
            '/v2/origin/custom/'.$this->scope_id,
            $data
        );
    }
    public function updateDeliveryStatus($data,$msg_id)
    {
        return $this->request(
            'POST',
            '/v2/origin/custom/'.$this->scope_id.'/'.$msg_id.'/delivery_status',
            $data
        );
    }
    public function getHistoryChats($conversation_id)
    {
        return $this->request(
            'POST',
            '/v2/origin/custom/'.$this->scope_id.'/chats/'.$conversation_id.'/history',
            []
        );
    }

    public function typing($data,$channel_id)
    {
        return $this->request(
            'POST',
            '/v2/origin/custom/'.$channel_id.'/typing',
            $data
        );
    }

    public function request($method, $links, $data)
    {
        $contentType = 'application/json';
        $date = date(DateTimeInterface::RFC2822);


        $requestBody = empty($data)?'':json_encode($data);
        $checkSum = md5($requestBody);

        $str = implode("n", [
            strtoupper($method),
            $checkSum,
            $contentType,
            $date,
            $links,
        ]);

        $signature = hash_hmac('sha1', $str, $this->secret);

        $headers = [
            'Date' => $date,
            'Content-Type' => $contentType,
            'Content-MD5' => strtolower($checkSum),
            'X-Signature' => strtolower($signature),
        ];

        $curlHeaders = [];
        foreach ($headers as $name => $value) {
            $curlHeaders[] = $name . ": " . $value;
        }

        echo $method . ' ' . $this->url . PHP_EOL;
        foreach ($curlHeaders as $header) {
            echo $header . PHP_EOL;
        }
        echo PHP_EOL . $requestBody . PHP_EOL;

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $requestBody,
            CURLOPT_HTTPHEADER => $curlHeaders,
        ]);


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