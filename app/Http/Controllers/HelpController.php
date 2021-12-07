<?php

namespace App\Http\Controllers;

use App\Models\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function fetchHelps(){
        $helps = Help::all();
        return response()->json($helps);
    }
}
