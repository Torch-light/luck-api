<?php
namespace App\Interfaces;

Interface BaseSystemInterface
{

    public function getModel();
    public function find();
    public function update($obj);
    public function delete($obj);
    public function create($obj);

}