<?php
namespace App\Contracts;

trait Tags
{
    public function getTags()
    {
        return $this->amoclient->request(
            'GET',
            $this->amoclient->url.$this->urlentity.'/tags'
        );
    }
    public function setTags($data)
    {
        return $this->amoclient->request(
            'POST',
            $this->amoclient->url.$this->urlentity.'/tags',
            $data
        );
    }
    public function setTagsEntity($data,$id=0)
    {
        if ($id) {
            return $this->amoclient->request(
                'PATCH',
                $this->amoclient->url.$this->urlentity.'/'.$id,
                $data
            );
        } else {
            return $this->amoclient->request(
                'PATCH',
                $this->amoclient->url.$this->urlentity,
                $data
            );
        }
    }
    public function deleteTagsEntity($data,$id=0)
    {
        if ($id) {
            return $this->amoclient->request(
                'DELETE',
                $this->amoclient->url.$this->urlentity.'/'.$id,
                $data
            );
        } else {
            return $this->amoclient->request(
                'DELETE',
                $this->amoclient->url.$this->urlentity,
                $data
            );
        }
    }
}