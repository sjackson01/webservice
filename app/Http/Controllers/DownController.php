<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\ConnectException;
use App\Util\Down;

class DownController extends Controller
{

   protected $parameters;  

   /**
    * Class constructor.
    *
    */
   public function __construct(Down $parameters)
   {   
       $this->parameters = $parameters; 
   }

   /**
    * Return view and data from endpoint
    * @return View
    */
   public function download()
   {    
       try
       {        
             $parameters = $this->parameters->getParameters(); 
             
             return view('down', compact('parameters'));
                
       }    

       catch (ConnectException $e)
       {    
           $message = "No endpoint set or file uploaded.";    

           return view('down', compact('message'));
       }
   }
}