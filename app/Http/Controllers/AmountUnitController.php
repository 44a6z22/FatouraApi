<?php

namespace App\Http\Controllers;

use App\AmountUnit;
use Illuminate\Http\Request;

class AmountUnitController extends Controller
{
    public function index()
    {
        return AmountUnit::get();
    }
}
