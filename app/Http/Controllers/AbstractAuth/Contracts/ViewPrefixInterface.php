<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;

interface ViewPrefixInterface{
    public function setViewPrefix(string $viewPrefix):void;
   
    public function getViewPrefix( ):string;
   
}