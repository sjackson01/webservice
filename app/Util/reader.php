<?php


namespace App\Util;
use Illuminate\Support\Facades\DB;

class Reader
{
    /**
    * Return list of webservice
    * functions 
	* @return Query 
	*/
    public function selectFunctions()
    {   
        $query = DB::table('functions')->pluck('functions');

        return $query;       
    }

    /**
    * Return list of saved active
    * webservice functions
	* @return Query 
	*/
    public function selectLockFunctions()
    {   
        $query = DB::table('lock')->pluck('functions');

        return $query;       
    }

    /**
    * Return list of active 
    * webservice function ids 
	* @return Query 
	*/
    public function selectLockIds()
    {   
        $query = DB::table('lock')->pluck('id');

        return $query;       
    }

}