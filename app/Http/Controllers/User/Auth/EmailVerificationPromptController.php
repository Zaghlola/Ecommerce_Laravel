<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\AbstractAuth\Auth\EmailVerificationPromptController as  AbstractAuthEmailVerificationPromptController;

class EmailVerificationPromptController extends AbstractAuthEmailVerificationPromptController
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user('web')->hasVerifiedEmail()
                    ? redirect()->route('users.dashboard')
                    : view('user.auth.verify-email');
    }
}
