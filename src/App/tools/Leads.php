<?php

namespace App\tools;

use App\Contracts\BaseEntity;
use App\Contracts\Custom_fields;
use App\Contracts\Event;
use App\Contracts\LinksEntity;
use App\Contracts\Tags;

class Leads extends BaseEntity
{
    use Custom_fields;
    use LinksEntity;
    use Tags;
    use Event;

    public string $urlentity = 'api/v4/leads';

    public function complex($data)
    {
        return $this->amoclient->request(
            'POST',
            $this->amoclient->url.$this->urlentity.'/complex',
            $data
        );
    }
}