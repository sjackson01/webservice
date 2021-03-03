<?php

namespace App\Util;
use Illuminate\Support\Facades\DB;

class Reader Extends Down
{

   /**
    * Return list of webservice
    * functions 
	* @return Query 
	*/
    public function selectFunctions()
    {   
        return DB::table('functions')->get(); 
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

   /**
    * Return moodle url 
	* @return Query 
	*/
    public function selectMoodleURL()
    {

        $query = DB::table('settings')->first();

        return $query;
    }

}