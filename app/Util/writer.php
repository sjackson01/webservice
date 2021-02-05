<?php

namespace App\Util;
use Illuminate\Support\Facades\DB;

class Writer Extends Reader
{
    /**
    * Insert functions into
    * active function
	* @return Query 
	*/
    public function insertFunctions($function)
    {   
        DB::table('lock')->insert(['functions' => $function]);
    }

    /**
    * Delete functions from 
    * active functions
	* @return Query 
	*/
    public function deleteFunctions($lockId)
    {   
        DB::table('lock')->delete(['id' => $lockId]);
    }

}