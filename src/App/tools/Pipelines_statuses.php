<?php

namespace App\tools;

use App\AmoCurl;

class Pipelines_statuses extends \App\Contracts\BaseEntity
{

    public function __construct(AmoCurl $amoclient, int $pipeline_id=0)
    {
        parent::__construct($amoclient);

        $this->urlentity='api/v4/leads/pipelines/'.$pipeline_id.'/statuses';
    }

    public function update($data, $id=0)
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