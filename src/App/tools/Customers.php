<?php

namespace App\tools;

use App\Contracts\Custom_fields;
use App\Contracts\LinksEntity;
use App\Contracts\Tags;

class Customers extends \App\Contracts\BaseEntity
{
    use LinksEntity;
    use Custom_fields;
    use Tags;


    public string $urlentity = 'api/v4/customers';

    public function mode($data)
    {
        return $this->amoclient->request(
            'PATCH',
            $this->amoclient->url.$this->urlentity.'/mode',
            $data
        );
    }

    public function bonus_points($data,$id)
    {
        return $this->amoclient->request(
            'PATCH',
            $this->amoclient->url.$this->urlentity.'/'.$id.'/bonus_points',
            $data
        );
    }

}