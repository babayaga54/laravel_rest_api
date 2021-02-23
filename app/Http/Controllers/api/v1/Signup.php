<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Signup extends Controller
{
  function create(Request $request)
{
  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $request
   * @return \Illuminate\Contracts\Validation\Validator
   */
  $valid = validator($request->only('email', 'name', 'password'), [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6'
  ]);

  if ($valid->fails()) {
      $jsonError=response()->json($valid->errors()->all(), 400);
      return \Response::json($jsonError);
  }

  $data = request()->only('email','name','password');

  $user = User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => bcrypt($data['password'])
  ]);

  $accessToken = $user->createToken('authToken')->accessToken;

  return response(['user'=> $user, 'access_token'=> $accessToken]);

  // And created user until here.

//burdan alta kadar orjinali var
/*  $client = Client::where('password_client', 1)->first();

  // Is this $request the same request? I mean Request $request? Then wouldn't it mess the other $request stuff? Also how did you pass it on the $request in $proxy? Wouldn't Request::create() just create a new thing?

  $request->request->add([
      'grant_type'    => 'password',
      'client_id'     => $client->id,
      'client_secret' => $client->secret,
      'username'      => $data['email'],
      'password'      => $data['password'],
      'scope'         => null,
  ]);

  // Fire off the internal request.
  $token = Request::create(
      'oauth/token',
      'POST'
  );
  return \Route::dispatch($token); */


}
}
