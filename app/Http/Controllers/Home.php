<?php

namespace App\Http\Controllers;

use App\Models\PodesavanjaModel;
use App\Models\PopisModel;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function home()
    {
        $firma = PodesavanjaModel::first();
        $lista = PopisModel::get();

        return view('dashboard',[
            'firma' => $firma->firma,
            'listapopisa' => $lista
        ]);
    }
}
