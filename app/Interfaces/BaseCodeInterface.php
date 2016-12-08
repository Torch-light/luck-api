<?php
namespace App\Interfaces;

Interface BaseCodeInterface
{

    public function getModel();
    public function find($obj);
    public function update($obj);
    public function delete($obj);
    public function create($obj,$name);
    public function getCode($obj);
    public function getOnceCode($obj);
    public function setOnceCode($obj);

}