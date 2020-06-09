<?php

namespace App\Http\Controllers;

use App\Mode_reglement;
use Illuminate\Http\Request;

class ModeReglementController extends Controller
{
  
    public function index()
    {
        //
        
        $mode_reg=Mode_reglement::all();
        return $mode_reg;

    }

  
    public function store(Request $request)
    {
        //
        $mode_reg=new Mode_reglement();
        $mode_reg->mode_value=$request->input('mode_value');
        $mode_reg->save();
        return $mode_reg;
    }

    

 
    public function update(Request $request, $id)
    {
        //
        $mode_reg=Mode_reglement::find($id);
        $mode_reg->mode_value=$request->input('mode_value');
        $mode_reg->save();
        return [$mode_reg,"Updated With Success"];
    }


    public function destroy($id)
    {
        //
        $mode_reg = Mode_reglement::find($id);
        $mode_reg -> delete();
        return 'deleted';
    }
}
