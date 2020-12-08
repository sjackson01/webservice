<?php

namespace App\Http\Controllers;
use App\Util\Up;

class UpController extends Controller
{

   protected $bodyUp;

   /**
    * Class constructor.
    *
    */
   public function __construct(Up $bodyUp)
   {   
       $this->bodyUp = $bodyUp; 
   }

   /**
    * 
    * @return View
    */
   public function upload()
   {    
       $bodyUp = $this->bodyUp->getBodyUp(); 
       
       return view('up', compact('bodyUp'));
   }
   
    
}