<?php
namespace App\Interfaces;

Interface BaseRechargeInterface
{

    public function getModel();
    public function find($obj);
    public function update($obj);
    public function delete($obj);
    public function create($obj);

}