<?php

namespace App\tools;

class Tasks extends \App\Contracts\BaseEntity
{
    public string $urlentity = 'api/v4/tasks';

    public function completionTask($data ,$id=0)
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