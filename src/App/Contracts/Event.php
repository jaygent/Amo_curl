<?php

namespace App\Contracts;

trait Event
{
    public function getNotes()
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/notes'
        );
    }
    public function getNotesEntity($entity_id)
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/'.$entity_id.'/notes'
        );
    }
    public function getNotesId($id)
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/notes/'.$id
        );
    }
    public function getNotesEntityId($entity_id,$id)
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/'.$entity_id.'/notes/'.$id
        );
    }
    public function setNotes($data)
    {
        return $this->amoclient->request(
            'POST',
            $this->amoclient->url.$this->urlentity.'/notes',
            $data
        );
    }
    public function setNotesEntity($data,$entity_id)
    {
        return $this->amoclient->request(
            'POST',
            $this->amoclient->url.$this->urlentity.'/'.$entity_id.'/notes',
            $data
        );
    }
    public function updateNotes($data)
    {
        return $this->amoclient->request(
            'PATCH',
            $this->amoclient->url.$this->urlentity.'/notes',
            $data
        );
    }
    public function updateNotesEntity($data,$entity_id,$id)
    {
        if ($id) {
            return $this->amoclient->request(
                'PATCH',
                $this->amoclient->url.$this->urlentity.'/'.$entity_id.'/notes/'.$id,
                $data
            );
        } else {
            return $this->amoclient->request(
                'PATCH',
                $this->amoclient->url.$this->urlentity.'/'.$entity_id.'/notes',
                $data
            );
        }
    }
}