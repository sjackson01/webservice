<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function show()
    {   
        $functions = DB::table('functions')->get();

        return view('functions', ['functions' => $functions]);
    
    }

}