<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\ModelInterface;
use App\Http\Controllers\AbstractAuth\Contracts\ViewPrefixInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePerfixInterface;

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
        return view($this->getViewPrefix() . 'auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd( $this->getModel());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . $this->getModel()],
            'phone' => ['required', 'regex://', 'unique:' . $this->getModel()],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = $this->getModel()::create([
            'name' => $request->name,
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
