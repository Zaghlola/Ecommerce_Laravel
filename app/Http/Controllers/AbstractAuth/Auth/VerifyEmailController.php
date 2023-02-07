<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePerfixInterface;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

abstract class VerifyEmailController extends Controller implements
RouteNamePerfixInterface,
GuardInterface

{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    { 
        $route = route($this->getRouteNamePerfix().'dashboard').'?verified=1';
        if ($request->user($this->getGuard())->hasVerifiedEmail()) {
            return redirect($route);
        }

        if ($request->user($this->getGuard())->markEmailAsVerified()) {
            event(new Verified($request->user($this->getGuard())));
        }

        return redirect($route);
    }
}
