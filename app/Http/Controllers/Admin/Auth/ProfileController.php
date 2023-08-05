<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\AbstractAuth\Auth\ProfileController as AbstractProfileController;

class ProfileController extends AbstractProfileController
{
    private $guard='admin';
    private $viewPrefix='admin.';
    private $routeNamePrefix='admins.';
   
 
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
    public function setViewPrefix(string $viewPrefix):void
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
    public function setRouteNamePerfix(string $routeNamePrefix):void
    {
       $this->routeNamePrefix = $routeNamePrefix;
 
     
    }
}
