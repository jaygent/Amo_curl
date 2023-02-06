<?php

namespace App;

/**
 * Сохранение и получение Токенов из amocrm
 */
class Token
{
      public static string $filename =__DIR__.'/token.json';
    /**
     * @param array $data
     * @return void
     */
    public static function setToken(string $data): void
    {
        $data=json_decode($data);
        $data->expires_in=time()+$data->expires_in;
        $data=json_encode($data);
        $fh = fopen(self::$filename, 'w');
        fwrite($fh, $data);
        fclose($fh);
    }

    /**
     * @return array
     */
    public static function getToken(): array
    {
        $fh = fopen(self::$filename, 'r');
        $file = fread($fh,filesize(self::$filename));
        fclose($fh);
     return  json_decode($file,true);
    }
}
