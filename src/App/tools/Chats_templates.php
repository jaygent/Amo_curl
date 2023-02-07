<?php

namespace App\tools;

use App\Contracts\BaseEntity;

class Chats_templates extends BaseEntity
{
    public string $urlentity = 'api/v4/chats/templates';


    public function delete($data,$id=0)
    {
        if ($id) {
            return $this->amoclient->request(
                'DELETE',
                $this->amoclient->url.$this->urlentity.'/'.$id,
                $data
            );
        } else {
            return $this->amoclient->request(
                'DELETE',
                $this->amoclient->url.$this->urlentity,
                $data
            );
        }
    }

}