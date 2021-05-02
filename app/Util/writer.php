<?php

namespace App\Util;
use Illuminate\Support\Facades\DB;

class Writer
{
       
   /**
    * Insert functions and parameters
    * into active functions
	* @return bool
	*/
    public function insertFunctions($function, $parameter1, $parameter2, $parameter3, $parameter4, $parameter5, $parameter6)
    {   
        DB::table('lock')->insert(array(
            'functions' => $function,
            'parameter1' => $parameter1,
            'parameter2' => $parameter2,
            'parameter3' => $parameter3,
            'parameter4' => $parameter4,
            'parameter5' => $parameter5,
            'parameter6' => $parameter6
        ));
    }

   /**
    * Delete functions from 
    * active functions
	* @return bool 
	*/
    public function deleteFunctions($lockId)
    {   
        DB::table('lock')->delete(['id' => $lockId]);
    }

   /**
    * Update moodle url
	* @return bool
	*/
    public function updateMoodleUrl($url)
    {   
        DB::table('settings')->where('settingsId', 1)->update(['url' => $url]);
    }

   /**
    * Update moodle token
	* @return bool
	*/
    public function updateMoodleToken($token)
    {   
        DB::table('settings')->where('settingsId', 1)->update(['token' => $token]);
    }

   /**
    * Update source url
	* @return bool
	*/
    public function updateSourceUrl($url)
    {   
        DB::table('settings')->where('settingsId', 2)->update(['url' => $url]);
    }

   /**
    * Update source token
	* @return bool
	*/
    public function updateSourceToken($token)
    {   
        DB::table('settings')->where('settingsId', 2)->update(['token' => $token]);
    }

}