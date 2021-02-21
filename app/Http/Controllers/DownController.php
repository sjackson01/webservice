<?php

namespace App\Http\Controllers;
use App\Util\Down;

class DownController extends Controller
{

   protected $bodyDown;
   protected $key; 
   protected $value;  

   /**
    * Class constructor.
    *
    */
   public function __construct(Down $bodyDown, Down $key, Down $value)
   {   
       $this->bodyDown = $bodyDown; 
       $this->key = $key; 
       $this->value = $value; 

   }

   /**
    * Return view and data from endpoint
    * @return View
    */
   public function download()
   {    
       $bodyDown = $this->bodyDown->getBodyDown(); 
       $key = $this->key->getKey(); 
       $value = $this->value->getValue(); 
       
       return view('down', compact('bodyDown', 'key', 'value'));
   }
    
}