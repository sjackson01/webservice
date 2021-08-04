<?php

namespace App\Http\Controllers;
use App\Util\Up;

class UpController extends Controller
{

   protected $url;

   /**
    * Class constructor.
    *
    */
   public function __construct(Up $url)
   {    
       $this->url = $url; 
   }

   public function up()
   {
        $urls = $this->url->sendData();
        
        return view('up', compact('urls')); 
   }
   
}