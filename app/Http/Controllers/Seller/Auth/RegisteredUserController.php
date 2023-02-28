<?php

namespace App\Http\Controllers\Seller\Auth;


use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\AbstractAuth\Auth\RegisteredUserController as AbstractRegisteredUserController;
use Illuminate\Validation\Rules\Password;


class RegisteredUserController extends AbstractRegisteredUserController
{
    private $guard="seller";
    private $routeNamePrefix="sellers.";
    private $viewPrefix="seller.";
    private $model=Seller::class;
    

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
     * Get the value of model
     */ 
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */ 
    public function setModel($model):void
    {
        $this->model = $model;

        
    }

    public function store(Request $request): RedirectResponse
    {
        // dd( $this->getModel());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'shop_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . $this->getModel()],
            'phone' => ['required', 'regex://', 'unique:' . $this->getModel()],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = $this->getModel()::create([
            'name' => $request->name,
            'shop_name' => $request->shop_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        // Registered::dispatch($user);
        Auth::guard($this->getGuard())->login($user);

        return redirect()->route($this->getRouteNamePerfix() . 'dashboard');
    }
}
