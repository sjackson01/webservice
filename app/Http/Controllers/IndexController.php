<?php

namespace App\Http\Controllers;
use App\Util\Transfer;

class IndexController extends Controller
{

   protected $body;
   protected $status;
   protected $version; 

   /**
    * Class constructor.
    *
    */
   public function __construct(Transfer $status, Transfer $bodyUp, Transfer $bodyDown, Transfer $version)
   {   
       $this->status = $status; 
       $this->bodyUp = $bodyUp;
       $this->bodyDown = $bodyDown;
       $this->version = $version; 
   }

   /**
    * 
    * @return View
    */
   public function index()
   {    

       $status = $this->status->getStatus();
       $bodyUp = $this->bodyUp->getBodyUp(); 
       $bodyDown = $this->bodyDown->getBodyDown(); 
       $version = $this->version->getVersion(); 
       
       return view('welcome', compact('bodyUp', 'bodyDown', 'status', 'version'));
   }
   
    
}