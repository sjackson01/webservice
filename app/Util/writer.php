<?php

namespace App\Util;
use Illuminate\Support\Facades\DB;

class Writer
{
       
   /**
    * Insert functions into
    * active function
	* @return bool
	*/
    public function insertFunctions($function)
    {   
        DB::table('lock')->insert(['functions' => $function]);
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