<?php

namespace App\Http\Controllers;

use App\Provider;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthSocController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
    $user = Socialite::driver($provider)->user();

  /*
        //---------------------------------------
        $selectProvider = Provider::where('provider_id', $user->getId())->first();
        if (!$selectProvider) {
            //new user
            $userGetReal = User::where('email', $user->getEmail())->first();
            if (!$userGetReal) {
                //new Real User
                $newuser = new User();
                $newuser->email = $user->getEmail();
                $newuser->first_name = $user->getName();
                $newuser->save();
            }
            $newprovider = new Provider();
            $newprovider->provider_id = $user->getId();
            $newprovider->provider = $provider;
            if (!$userGetReal)
                $newprovider->user_id = $newuser->id;
            else
                $newprovider->user_id = $userGetReal->id;
            $newprovider->save();
        } else {

        }
        // All Providers

//        $user->getId();
//        $user->getNickname();
//        $user->getName();
//        $user->getEmail();
//        $user->getAvatar();

*/


        //---------------------------------------
        $selectProvider = Provider::where('provider_id', $user->getId())->first();
        if (!$selectProvider) {
            //new user
            $userGetReal = User::where('email', $user->getEmail())->first();
            if (!$userGetReal) {
                //new Real User

                $userGetReal = new Request();
                $userGetReal['email'] = $user->getEmail();
                $userGetReal['first_name'] = $user->getNickname();
                $userGetReal['last_name']= $user->getName();
                $userGetReal['password']='Default@Passw0rd@2017';

                $userGetReal=Sentinel::register($userGetReal->all(),true);//registerAndActivate
                //$userGetReal->save();
            }
            $newprovider = new Provider();
            $newprovider->provider_id = $user->getId();
            $newprovider->provider = $provider;
            $newprovider->user_id = $userGetReal->id;
            $newprovider->save();
        } else {
            $userGetReal=User::find($selectProvider->user_id);
        }
        $userGetReal=Sentinel::findById($userGetReal->id);
         Sentinel::login($userGetReal);

        return redirect('/');

    }
}
