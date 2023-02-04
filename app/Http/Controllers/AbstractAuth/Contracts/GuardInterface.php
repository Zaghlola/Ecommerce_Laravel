<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;

interface GuardInterface{
    public function setGuard(string $guard):void;
   
    public function getGuard( ):string;
   
}