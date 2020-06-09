<?php

namespace App\Http\Controllers;

use App\Interet_retard;
use Illuminate\Http\Request;

class InteretRetardController extends Controller
{
    
    public function index()
    {
        //
        $interet_ret=Interet_retard::all();
        return $interet_ret;    
    }

    public function store(Request $request)
    {
        //
        $interet_ret=new Interet_retard();
        $interet_ret->inter_value=$request->input('inter_value');
        $interet_ret->save();
        return $interet_ret;
    }

   
    public function update(Request $request, $id)
    {
        //
        $interet_ret=Interet_retard::find($id);
        $interet_ret->inter_value=$request->input('inter_value');
        $interet_ret->save();
        return [$interet_ret,"Updated With Success"];
    }

   
    public function destroy($id)
    {
        //
        $interet_ret=Interet_retard::find($id);
        $interet_ret->delete();
        return ('deleted with success');

    }
}
