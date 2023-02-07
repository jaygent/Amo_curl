<?php

namespace App\tools;

class Roles extends \App\Contracts\BaseEntity
{
    public string $urlentity = 'api/v4/roles';

    public function delete($id)
    {
        return $this->amoclient->request(
            'DELETE',
            $this->amoclient->url.$this->urlentity.'/'.$id,
        );
    }
}