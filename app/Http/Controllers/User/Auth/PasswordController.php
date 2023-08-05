<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\AbstractAuth\Auth\PasswordController as AbstractPasswordController;


class PasswordController extends AbstractPasswordController
{
    private $guard='web';
    

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
}
