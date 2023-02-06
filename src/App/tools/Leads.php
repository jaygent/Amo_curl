<?php

namespace App\tools;

use App\Contracts\BaseEntity;

class Leads extends BaseEntity
{

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