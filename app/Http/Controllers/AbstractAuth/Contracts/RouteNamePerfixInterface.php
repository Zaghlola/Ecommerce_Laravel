<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;

interface RouteNamePerfixInterface{
    public function setRouteNamePerfix(string $routeNamePerfix):void;
   
    public function getRouteNamePerfix( ):string;
   
}