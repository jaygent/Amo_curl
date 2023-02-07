<?php

namespace App\tools;

class Transactions extends \App\Contracts\BaseEntity
{
    public string $urlentity = 'api/v4/customers/transactions';

    public function  addCustomersTransactions($data,$customer_id)
    {
        return $this->amoclient->request(
            'PATCH',
            $this->amoclient->url.'api/v4/customers/'.$customer_id.'/transactions',
            $data
        );
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