<?php
namespace App\Interfaces;

Interface BaseCashInterface
{

    public function getModel();
    public function addcash($obj);
    public function update($obj);
    public function delete($obj);
    public function getall($obj);

}