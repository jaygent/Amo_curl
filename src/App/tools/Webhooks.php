<?php

namespace App\tools;

class Webhooks extends \App\Contracts\BaseEntity
{
    public string $urlentity = 'api/v4/webhooks';

    public function delete($data)
    {
        return $this->amoclient->request(
            'DELETE',
            $this->amoclient->url.$this->urlentity,
            $data
        );
    }
}