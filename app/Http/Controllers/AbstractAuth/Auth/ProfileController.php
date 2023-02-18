<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePerfixInterface;
use App\Http\Controllers\AbstractAuth\Contracts\ViewPrefixInterface;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

abstract class ProfileController extends Controller implements
ViewPrefixInterface,
GuardInterface,
RouteNamePerfixInterface
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view($this->getViewPrefix().'profile.edit', [
            'user' => $request->user($this->getGuard()),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user($this->getGuard())->fill($request->validated());

        if ($request->user($this->getGuard())->isDirty('email')) {
            $request->user($this->getGuard())->email_verified_at = null;
        }

        $request->user($this->getGuard())->save();

        return Redirect::route($this->getRouteNamePerfix().'profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user($this->getGuard());

        Auth::guard($this->getGuard())->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::route('users.dashboard');
    }
}
