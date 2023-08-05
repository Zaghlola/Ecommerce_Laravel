<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePerfixInterface;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

abstract class EmailVerificationNotificationController extends Controller implements
GuardInterface,
RouteNamePerfixInterface
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user($this->getGuard())->hasVerifiedEmail()) {
            return redirect()->route($this->getRouteNamePerfix().'dashboard');
        }

        $request->user($this->getGuard())->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
