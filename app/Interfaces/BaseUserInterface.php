<?php
namespace App\Interfaces;

Interface BaseUserInterface
{

    public function getModel();
    public function find($obj);
    public function updatePoints($obj,$type);
    public function deductPoints($obj);
    public function delete($obj);
    public function create($obj);
    public function getUsers($obj);
    public function register($obj,$code);
    public function getAll($obj);
    public function onceData($id,$string);

}