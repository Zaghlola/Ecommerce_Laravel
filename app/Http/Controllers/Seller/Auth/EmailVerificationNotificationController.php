<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\AbstractAuth\Auth\EmailVerificationNotificationController as AbstarctEmailVerificationNotificationController;

class EmailVerificationNotificationController extends AbstarctEmailVerificationNotificationController
{
    private $guard='seller';
   
    private $routeNamePrefix='sellers.';
   
 
    /**
     * Get the value of guard
     */ 
    public function getGuard():string
    {
       return $this->guard;
    }
 
    /**
     * Set the value of guard
     *
     * @return  self
     */ 
    public function setGuard(string $guard):void
    {
       $this->guard = $guard;
 
      
    }
 
   
 
    /**
     * Get the value of routeNamePrefix
     */ 
    public function getRouteNamePerfix():string
    {
       return $this->routeNamePrefix;
    }
 
    /**
     * Set the value of routeNamePrefix
     *
     * @return  self
     */ 
    public function setRouteNamePerfix(string $routeNamePrefix):void
    {
       $this->routeNamePrefix = $routeNamePrefix;
 
     
    }
}
