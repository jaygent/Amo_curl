<?php
namespace App\Contracts;

trait LinksEntity
{

    public function getEntityLink($entity_id){
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/'.$entity_id.'/links'
        );
    }

    public function setEntityLink($data,$entity_id)
    {
        return $this->amoclient->request(
            'POST',
            $this->amoclient->url.$this->urlentity.'/'.$entity_id.'/link',
            $data
        );
    }
    public function setEntityUnLink($data,$entity_id)
    {
        return $this->amoclient->request(
            'POST',
            $this->amoclient->url.$this->urlentity.'/'.$entity_id.'/unlink',
            $data
        );
    }

    public function getLinks()
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/links'
        );
    }

    public function setLink($data)
    {
        return $this->amoclient->request(
            'POST',
            $this->amoclient->url.$this->urlentity.'/link',
            $data
        );
    }
    public function setUnLink($data)
    {
        return $this->amoclient->request(
            'POST',
            $this->amoclient->url.$this->urlentity.'/unlink',
            $data
        );
    }
}