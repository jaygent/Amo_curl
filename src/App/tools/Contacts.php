<?php

namespace App\tools;

use App\Contracts\BaseEntity;

class Contacts extends BaseEntity
{

    public string $urlentity = 'api/v4/contacts';


    public function setchats($data)
    {
        return $this->amoclient->request(
            'POST',
            $this->amoclient->url.$this->urlentity.'/chats',
            $data
        );
    }

    public function getchats()
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/chats'
        );
    }

}