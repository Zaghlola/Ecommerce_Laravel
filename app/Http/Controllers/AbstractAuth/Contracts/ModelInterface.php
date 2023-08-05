<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;

interface ModelInterface{
    function setModel($model):void;
    function getModel();
}