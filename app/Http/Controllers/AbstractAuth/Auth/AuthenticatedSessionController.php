<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePerfixInterface;
use App\Http\Controllers\AbstractAuth\Contracts\ViewPrefixInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

abstract class AuthenticatedSessionController extends Controller implements
ViewPrefixInterface,
RouteNamePerfixInterface,
GuardInterface
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view($this->getViewPrefix() .'auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate($this->getGuard());

        $request->session()->regenerate();

        return redirect()->route($this->getRouteNamePerfix().'dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard($this->getGuard())->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route($this->getRouteNamePerfix().'login');
    }
}
