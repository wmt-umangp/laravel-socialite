<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
use App\Models\SocialAccount;
class SocialiteController extends Controller
{
    //google
    public function redirectTo(String $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     *
     * @return void
     */
    public function handleCallback(String $provider)
    {
        try{
            $social_user = Socialite::driver($provider)->user();
            // dd($social_user->name);
            $finduser = SocialAccount::where(['provider_name'=>'google','provider_id'=>$social_user->id])->first();

            if ($finduser) {
                Auth::login($finduser->user()->first());
                // dd(Auth::user()->name);
                    return redirect()->route('dashboard');
            }
            else {
                $newUser = User::updateOrCreate(['email' => $social_user->email],[
                    'name' => $provider=='google'?$social_user->getName():$social_user->getNickName(),
                    'email' => $social_user->getEmail(),
                ]);

                if ($newUser) {
                    $newUser->socialAccounts()->create(array(
                        'provider_name' => $provider,
                        'provider_id' => $social_user->id,
                    ));
                }

                Auth::login($newUser);
                // dd(Auth::user()->name);
                return redirect()->route('dashboard');
            }

        }catch(Exception $e){
            dd($e->getMessage());
        }

    }
}
