<?php

namespace App\tools;

use App\Contracts\BaseEntity;
use App\Contracts\Custom_fields;
use App\Contracts\Event;
use App\Contracts\LinksEntity;
use App\Contracts\Tags;

class Contacts extends BaseEntity
{
    use Custom_fields;
    use LinksEntity;
    use Tags;
    use Event;

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