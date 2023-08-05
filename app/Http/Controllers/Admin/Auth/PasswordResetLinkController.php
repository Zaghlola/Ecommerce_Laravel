<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\AbstractAuth\Auth\PasswordResetLinkController as AbstractPasswordResetLinkController;


class PasswordResetLinkController extends AbstractPasswordResetLinkController
{
    private $broker="admins";
    private $viewPrefix="admin.";

    /**
     * Get the value of broker
     */ 
    public function getBroker():string
    {
        return $this->broker;
    }

    /**
     * Set the value of broker
     *
     * @return  self
     */ 
    public function setBroker($broker):void
    {
        $this->broker = $broker;

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
}
