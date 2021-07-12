<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function anasayfa(){
        $kkalankatilim = User::where('id', Auth::user()->id)->first()->kalankatilim;
        return view('uyepaneli.main', ['kalanhak' => $kkalankatilim]);
    }
}
