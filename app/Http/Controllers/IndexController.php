<?php

namespace App\Http\Controllers;
use App\Util\Receive;

class IndexController extends Controller
{

   protected $body;
   protected $status;
   protected $version; 

   /**
    * Class constructor.
    *
    */
   public function __construct(Receive $status, Receive $body, Receive $version)
   {   
       $this->status = $status; 
       $this->body = $body;
       $this->version = $version; 
   }

   /**
    * 
    * @return View
    */
   public function index()
   {    

       $status = $this->status->getStatus();
       $body = $this->body->getBody(); 
       $version = $this->version->getVersion(); 
       
       return view('welcome', compact('body', 'status', 'version'));
   }
   
    
}