<?php

namespace App\tools;

class Pipelines extends \App\Contracts\BaseEntity
{
    public string $urlentity = 'api/v4/leads/pipelines';


    public function update($data, $id)
    {
        return $this->amoclient->request(
                'PATCH',
                $this->amoclient->url.$this->urlentity.'/'.$id,
                $data
            );
    }

    public function delete($id)
    {
        return $this->amoclient->request(
            'DELETE',
            $this->amoclient->url.$this->urlentity.'/'.$id
        );
    }

}