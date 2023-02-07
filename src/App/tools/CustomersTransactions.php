<?php

namespace App\tools;

use App\AmoCurl;

class CustomersTransactions extends \App\Contracts\BaseEntity
{
    public function __construct(AmoCurl $amoclient, int $customers_id=0)
    {
        parent::__construct($amoclient);

        $this->urlentity='api/v4/customers/'.$customers_id.'/transactions';
    }

    public function  delete($data,$id)
    {
        return $this->amoclient->request(
            'PATCH',
            $this->amoclient->url.$this->urlentity.'/'.$id,
            $data
        );
    }
}