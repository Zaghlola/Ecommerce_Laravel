<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\ViewPrefixInterface;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

abstract class EmailVerificationPromptController extends Controller implements
GuardInterface,
ViewPrefixInterface
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user($this->getGuard())->hasVerifiedEmail()        
                    ? redirect()->route($this->getRouteNamePrefix() .'dashboard')
                    : view($this->getViewPrefix().'auth.verify-email');
    }
}
