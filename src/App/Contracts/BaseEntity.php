<?php

namespace App\Contracts;

use App\AmoCurl;

class BaseEntity implements Entity
{
    protected AmoCurl $amoclient;

    public string $urlentity;

    public function __construct(AmoCurl $amoclient)
    {
        $this->amoclient=$amoclient;
    }

    public function all()
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity
        );
    }

    public function find($id)
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/'.$id
        );
    }

    public function create($data)
    {
        return $this->amoclient->request(
            'POST',
            $this->amoclient->url.$this->urlentity,
            $data
        );
    }

    public function update($data, $id = 0)
    {
        if ($id) {
            return $this->amoclient->request(
                'PATCH',
                $this->amoclient->url.$this->urlentity.'/'.$id,
                $data
            );
        } else {
            return $this->amoclient->request(
                'PATCH',
                $this->amoclient->url.$this->urlentity,
                $data
            );
        }
    }
}