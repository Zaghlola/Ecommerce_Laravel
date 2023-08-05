<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;

interface BrokerInterface{
    public function setBroker(string $broker):void;
   
    public function getBroker( ):string;
   
}