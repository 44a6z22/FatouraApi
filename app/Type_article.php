<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Type_article extends Model
{
    //
    public function facture_default()
    {
        return $this->hasMany(FactureDefault::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function store(Request $request)
    {
        $this->user_id = Auth::user()->id;
        $this->article_type_value = $request->article_type_value;
        $this->article_type_value_eng = $request->article_type_value_eng;

        $this->save();
    }
}
