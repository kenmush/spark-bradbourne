<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Socialite;
class LoginController extends Controller
{
/**
 * Redirect the user to the given authentication page.
 *
 * @param Request $request
 * @param facebook $provider string The social provider e.g. facebook
 * @param register $purpose string Whether the user is logging in or registering
 *
 * @return \Symfony\Component\HttpFoundation\RedirectResponse
 */
 public function redirectToProvider(Request $request, string $provider, string $purpose)
 {
    $purpose = $request->session()->put('social:purpose');
     return Socialite::driver($provider)->redirect();
 }
}