<?php

namespace App\Contracts;

trait Custom_fields
{
    public function getfields()
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/custom_fields'
        );
    }
    public function getIdfields($id)
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/custom_fields/'.$id
        );
    }
    public function setfields($data)
    {
        return $this->amoclient->request(
            'POST',
            $this->amoclient->url.$this->urlentity.'/custom_fields',
            $data
        );
    }
    public function setupdatefields($data,$id=0)
    {
        if ($id) {
            return $this->amoclient->request(
                'PATCH',
                $this->amoclient->url.$this->urlentity.'/custom_fields/'.$id,
                $data
            );
        } else {
            return $this->amoclient->request(
                'PATCH',
                $this->amoclient->url.$this->urlentity.'/custom_fields',
                $data
            );
        }
    }
    public function deletefields($data,$id)
    {
        return $this->amoclient->request(
            'DELETE',
            $this->amoclient->url.$this->urlentity.'/custom_fields/'.$id,
            $data
        );
    }

    public function getGroups()
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/custom_fields/groups'
        );
    }
    public function getGroupsId($id)
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/custom_fields/groups/'.$id
        );
    }
    public function setGroups($data)
    {
        return $this->amoclient->request(
            'POST',
            $this->amoclient->url.$this->urlentity.'/custom_fields/groups',
            $data
        );
    }
    public function setUpdateGroups($data,$id=0)
    {
            return $this->amoclient->request(
                'PATCH',
                $this->amoclient->url.$this->urlentity.'/custom_fields/'.$id,
                $data
            );
    }
    public function deleteGroups($data,$id)
    {
        return $this->amoclient->request(
            'DELETE',
            $this->amoclient->url.$this->urlentity.'/custom_fields/groups/'.$id,
            $data
        );
    }
}
