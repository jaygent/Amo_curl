<?php

namespace App\Helpers;

use App\Model\Contacts;
use App\Model\Users;
use League\OAuth2\Client\Token\AccessToken;

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
    public static function setToken(array $data): void
    {
        $fh = fopen(self::$filename, 'w');
        fwrite($fh, $data);
        fclose($fh);
    }

    /**
     * @return array
     */
    public static function getToken(): array
    {
        $file=file_get_contents(self::$filename);
     return  json_decode($file,true);
    }
}
