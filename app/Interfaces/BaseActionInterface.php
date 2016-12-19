<?php
namespace App\Interfaces;

Interface BaseActionInterface
{

    public function getModel();
    public function find($obj);
    public function update($obj);
    public function delete($obj);
    public function create($obj);
    public function getAll($obj);
    public function delaction($obj);
    public function getaction($obj);

}