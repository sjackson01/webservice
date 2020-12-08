<?php

namespace App\Http\Controllers;
use App\Util\Down;

class DownController extends Controller
{

   protected $bodyDown;

   /**
    * Class constructor.
    *
    */
   public function __construct(Down $bodyDown)
   {   
       $this->bodyDown = $bodyDown; 
   }

   /**
    * 
    * @return View
    */
   public function download()
   {    
       $bodyDown = $this->bodyDown->getBodyDown(); 
       
       return view('down', compact('bodyDown'));
   }
   
    
}