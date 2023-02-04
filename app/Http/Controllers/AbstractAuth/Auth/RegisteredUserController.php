<?php

namespace App\Http\Controllers\AbstractAuth\Contracts;

use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePerfixInterface;
use App\Http\Controllers\AbstractAuth\Contracts\ViewPrefixInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

abstract class RegisteredUserController extends Controller implements
ViewPrefixInterface,
GuardInterface,
RouteNamePerfixInterface,
ModelInterface
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view($this->getViewPrefix().'auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.$this->getModel()::class],
            'phone'=>['required','regex://','unique:'.$this->getModel()::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard($this->getGuard())->login($user);

        return redirect()->route($this->getRouteNamePerfix().'dashboard');
    }
}
