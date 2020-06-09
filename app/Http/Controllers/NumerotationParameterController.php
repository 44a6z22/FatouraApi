<?php

namespace App\Http\Controllers;

use App\NumerotationParameter;
use App\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NumerotationParameterController extends Controller
{
   
    public function index()
    {
        //
        return NumerotationParameter::get()
            ->where('parameter_id', Auth::user()->parameteres->first()->id);
    }

   
    public function store(Request $request)
    {

        $num = NumerotationParameter::MakeIfNotExist();
        $num->store($request);

        return $num;
    }

   
   
 
   
    public function destroy(NumerotationParameter $numerotationParameter)
    {
        //
    }
}
