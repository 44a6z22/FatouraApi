<?php

namespace App\Http\Controllers;

use App\Condition_reglement;
use Illuminate\Http\Request;

class ConditionReglementController extends Controller
{

    public function index()
    {
        //
        $condition_reg = Condition_reglement::all();
        return $condition_reg;
    }
    public function store(Request $request)
    {
        //
        $condition_reg = new Condition_reglement();
        $condition_reg->Condition_value = $request->input('Condition_value');
        $condition_reg->save();
        return  $condition_reg;
    }

    public function update(Request $request, $id)
    {
        //
        $condition_reg = Condition_reglement::find($id);
        $condition_reg->Condition_value = $request->input('Condition_value');
        $condition_reg->save();
        return [$condition_reg, "Updated With Success"];
    }

    public function destroy($id)
    {
        //
        $condition_reg = Condition_reglement::find($id);
        $condition_reg->delete();
        return ["Deleted With Success"];
    }
}
