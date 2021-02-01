<?php

namespace App\Http\Controllers;
use App\Util\Reader;

class DatabaseController extends Controller
{

   protected $queryFunctions;

   /**
    * Class constructor.
    *
    */
   public function __construct(Reader $queryFunctions)
   {   
       $this->queryFunctions = $queryFunctions; 
   }

   /**
    * Return view and data from endpoint
    * @return View
    */
   public function displayFunctions()
   {    
       $functions = $this->queryFunctions->getFunctions(); 
       
       return view('database', compact('functions'));
   }
   
    
}
