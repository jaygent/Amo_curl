<?php

namespace App\tools;

use App\AmoCurl;

class Short_links
{
    protected AmoCurl $amoclient;

    public static string $urlentity = 'api/v4/short_links';

    public function __construct(AmoCurl $amoclient)
    {
        $this->amoclient=$amoclient;
    }

    public function createLinks($data)
    {
        return $this->amoclient->request(
            'POST',
            $this->amoclient->url.$this->urlentity,
            $data
        );
    }
}