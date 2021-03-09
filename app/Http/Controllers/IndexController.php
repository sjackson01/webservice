<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\ConnectException;
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
    * Return view and data from endpoint
    * @return View
    */
   public function index()
   {  
        try 
        {
            $upStatus = $this->upStatus->getUpStatus(); 
            $downStatus = $this->downStatus->getDownStatus(); 
            
            return view('welcome', compact('upStatus', 'downStatus'));
        }

        catch(ConnectException $e)
        {
            return view('welcome'); 
        }
    }
}