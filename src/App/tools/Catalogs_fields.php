<?php

namespace App\tools;

use App\Contracts\Custom_fields;

class Catalogs_fields
{
    use Custom_fields;

    public string $urlentity;

    public function __construct($catalogs_id)
    {
        $this->urlentity='api/v4/catalogs/'.$catalogs_id;
    }

}