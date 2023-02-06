<?php

namespace App\tools;

use App\AmoCurl;

class Catalogs_Elements extends \App\Contracts\BaseEntity
{
    public function __construct(AmoCurl $amoclient, int $catalog_id)
    {
        parent::__construct($amoclient);
        $this->urlentity='api/v4/catalogs/'.$catalog_id .'/elements';
    }

}