<?php

namespace App\tools;

use App\Contracts\Event;

class Catalogs extends \App\Contracts\BaseEntity
{
    use Event;

    public string $urlentity = 'api/v4/catalogs';

}