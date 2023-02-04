<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\AbstractAuth\Auth\EmailVerificationNotificationController as AbstarctEmailVerificationNotificationController;

class EmailVerificationNotificationController extends AbstarctEmailVerificationNotificationController
{
    private $guard='web';
    private $viewPrefix='user.';
    private $routeNamePrefix='users.';
   
 
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
    public function setGuard($guard):void
    {
       $this->guard = $guard;
 
      
    }
 
    /**
     * Get the value of viewPrefix
     */ 
    public function getViewPrefix():string
    {
       return $this->viewPrefix;
    }
 
    /**
     * Set the value of viewPrefix
     *
     * @return  self
     */ 
    public function setViewPrefix($viewPrefix):void
    {
       $this->viewPrefix = $viewPrefix;
 
      
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
    public function setRouteNamePerfix($routeNamePrefix):void
    {
       $this->routeNamePrefix = $routeNamePrefix;
 
     
    }
}
