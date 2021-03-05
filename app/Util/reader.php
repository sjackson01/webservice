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
    public function selectMoodleUrl()
    {

        $query = DB::table('settings')->first();

        return $query;
    }

    /**
    * Return source url 
	* @return Query 
	*/
    public function selectSourceUrl()
    {

        $query = DB::table('settings')->where('settingsId', 2)->first();

        return $query;
    }

}