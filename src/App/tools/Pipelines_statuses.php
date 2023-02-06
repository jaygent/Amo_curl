<?php

namespace App\tools;

use App\AmoCurl;

class Pipelines_statuses extends \App\Contracts\BaseEntity
{

    public function __construct(AmoCurl $amoclient,$pipeline_id)
    {
        parent::__construct($amoclient);

        $this->urlentity='api/v4/leads/pipelines/'.$pipeline_id.'/statuses';
    }

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