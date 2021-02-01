<?php

namespace App\Http\Controllers;
use App\Util\Reader;

class DatabaseController extends Controller
{

   protected $queryFuntions;

   /**
    * Class constructor.
    *
    */
   public function __construct(Reader $queryFunctions)
   {   
       $this->queryFunctions = $queryFuntions; 
   }

   /**
    * Return view and data from endpoint
    * @return View
    */
   public function displayFunctions()
   {    
       $functions = $this->queryFuntions->getFunctions(); 
       
       return view('database', compact('funcitons'));
   }
   
    
}
