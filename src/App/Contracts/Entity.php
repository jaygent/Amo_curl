<?php
namespace App\Contracts;

interface Entity {

    public function all();
    public function find($id);
    public function create($data);
    public function update($data,$id=0);
}