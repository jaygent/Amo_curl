<?php

namespace App\tools;

use App\Contracts\Custom_fields;
use App\Contracts\Event;
use App\Contracts\LinksEntity;
use App\Contracts\Tags;

class Companies extends \App\Contracts\BaseEntity
{
    use LinksEntity;
    use Custom_fields;
    use Tags;
    use Event;

    public string $urlentity = 'api/v4/companies';

}