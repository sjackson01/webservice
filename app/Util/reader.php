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

    public function getLockFunctions()
    {   
        $query = DB::table('lock')->pluck('functions');

        return $query;       
    }

    public function getLockIds()
    {   
        $query = DB::table('lock')->pluck('id');

        return $query;       
    }

}