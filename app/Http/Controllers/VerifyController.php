<?php

namespace App\Http\Controllers;

use App\NumerotationParameter;
use App\Parameter;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class VerifyController extends Controller
{
    public function VerifyEmail($token = null)
    {
        if ($token == null) {

            session()->flash('message', 'Invalid Login attempt');

            return redirect()->route('login');
        }

        $user = User::where('email_verification_token', $token)->first();

        if ($user == null) {

            return "User doesnt exist";
        }

        $user1 = User::where('email_verification_token', $token)->first();

        $user1->email_verified = 1;
        $user1->email_verified_at = Carbon::now();
        $user1->save();



        $parameters = new Parameter;
        $parameters->user_id = User::get()->where("email_verification_token", $token)->first()->id;
        $parameters->path = "default";
        $parameters->Param_Name = "default";
        $parameters->save();

        $num = new NumerotationParameter;
        $num->format = "<doc><aa><cmp>";
        $num->parameter_id = $parameters->id;
        $num->Min_Compteur_Valeur = 5;
        $num->save();
    }
}
