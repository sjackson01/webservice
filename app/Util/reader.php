<?php


namespace App\Util;
use Illuminate\Support\Facades\DB;

class Reader
{
    public function getFunctions()
    {   
        $query = DB::table('functions')->pluck('functions');

        return $query;       
    
    }

}