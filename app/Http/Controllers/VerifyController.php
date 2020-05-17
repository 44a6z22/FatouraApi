<?php

namespace App\Http\Controllers;

// use App\lib\ParametersDefaults;

use App\lib\ParameterSetter;
use App\NumerotationParameter;
use App\Parameter;
use App\User;
use Carbon\Carbon;
// use Illuminate\Http\Request;


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

        if ($user1->email_verified) {
            return [
                "your account already verified"
            ];
        }

        // SET DEFAULT PARAMETERS 

        // set default parameter 
        $p = Parameter::MakeIfNotExist($user1->id);

        // parameter Init
        $p->user_id = $user1->id;
        $p->path = "default";
        $p->Param_Name = "default " . User::get()->where('email_verification_token', $token)->first()->name;
        $p->save();

        // set default Numerotation Format and counter
        $n = new NumerotationParameter();
        $n->format = "<doc><aa><cmp>";
        $n->parameter_id = $p->id;
        $n->Min_compteur_Valeur = 5;
        $n->save();

        if ($user->parameteres->first() == null) {
            return ["didn't"];
        }

        $user1->email_verified = 1;
        $user1->email_verified_at = Carbon::now();
        $user1->save();
    }
}
