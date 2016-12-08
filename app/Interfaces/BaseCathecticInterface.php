<?php
namespace App\Interfaces;

Interface BaseCathecticInterface
{

    public function getModel();
    public function find($obj);
    public function update($obj);
    public function delete($obj);
    public function create($obj);

}