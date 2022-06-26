<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;

use Illuminate\Http\Request;

use Validator, Redirect, Response, File;

use Socialite;
use Auth;
use App\Models\User;


class SocialController extends Controller
{
  public function redirect($provider)
  {
    return Socialite::driver($provider)->redirect();
  }

  public function callback($provider)
  {

    $getInfo = Socialite::driver($provider)->user();

    $user = $this->createUser($getInfo, $provider);

    auth()->login($user);

    switch (Auth::user()->role->name) {
      case 'admin':
      case 'superadmin':
        return redirect()->to('/admin');
        break;
      default:
        return redirect()->to('/');
        break;
    }
  }
  function createUser($getInfo, $provider)
  {

    $user = User::where('email', $getInfo->email)->first();

    if (!$user) {
      $user = User::create([
        'email'    => $getInfo->email,
      ]);

      if ($user) {

        $name = explode(" ", $getInfo->name);

        Profile::create([
          'first_name' => $name[0],
          'last_name' => $name[1],
          'user_id' => $user->id,
          'avatar' => isset($path) ? 'uploads/' . $path : null,
          'provider' => $provider,
          'provider_id' => $getInfo->id,
        ]);
      }
    }

    return $user;
  }
}
