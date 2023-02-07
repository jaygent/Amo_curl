<?php

namespace App\tools;

class Events extends \App\Contracts\BaseEntity
{
    public string $urlentity = 'api/v4/events';

    public function getType()
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/types'
        );
    }
}