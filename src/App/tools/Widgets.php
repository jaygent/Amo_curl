<?php

namespace App\tools;

class Widgets extends \App\Contracts\BaseEntity
{
    public string $urlentity = 'api/v4/widgets';

    public function delete($id)
    {
        return $this->amoclient->request(
            'DELETE',
            $this->amoclient->url.$this->urlentity.'/'.$id
        );
    }
}