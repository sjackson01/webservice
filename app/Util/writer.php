<?php

namespace App\Util;
use Illuminate\Support\Facades\DB;

class Writer Extends Reader
{
    public function setFunctions($function)
    {   
        DB::table('lock')->insert(['functions' => $function]);
    }

}