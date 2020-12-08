<?php

namespace App\Http\Controllers;
use App\Util\Transfer;

class IndexController extends Controller
{

   protected $status;
   protected $version; 

   /**
    * Class constructor.
    *
    */
   public function __construct(Transfer $upStatus, Transfer $downStatus)
   {   
       $this->upStatus = $upStatus; 
       $this->downStatus = $downStatus; 
   }

   /**
    * 
    * @return View
    */
   public function index()
   {    

       $upStatus = $this->upStatus->getUpStatus(); 
       $downStatus = $this->downStatus->getDownStatus(); 

       return view('welcome', compact('upStatus', 'downStatus'));
   }
    
}