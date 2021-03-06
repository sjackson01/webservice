<?php

namespace App\Http\Controllers;
use App\Util\Up;

class UpController extends Controller
{

   protected $manualEnrol;
   protected $manualUnenrol;

   /**
    * Class constructor.
    *
    */
   public function __construct(Up $manualEnrol, Up $manualUnenrol)
   {    
       $this->manualEnrol = $manualEnrol;
       $this->manualUnenrol = $manualUnenrol; 
   }

   /**
    * Return view and data from endpoint
    * @return View
    */
   public function enrol()
   {      
       $manualEnrol = $this->manualEnrol->manualEnrol(); 
       return view('enrol', compact('manualEnrol'));
   }

   /**
    * Return view and data from endpoint
    * @return View
    */
   public function unenrol()
   {
        $manualUnenrol = $this->manualUnenrol->manualUnenrol(); 
        return view('unenrol', compact('manualUnenrol'));
   }
   
}