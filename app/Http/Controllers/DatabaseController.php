<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Util\Reader;
use App\Util\Writer;

class DatabaseController extends Controller
{

   protected $queryFunctions;
   protected $updateFunctions; 
   protected $queryLockFunctions;

   /**
    * Class constructor.
    *
    */
   public function __construct(Reader $queryFunctions, Reader $queryLockFunctions, Writer $updateFunctions)
   {   
       $this->queryFunctions = $queryFunctions;
       $this->updateFunctions = $updateFunctions;
       $this->queryLockFunctions = $queryLockFunctions;
   }

   /**
    * Return view and data from endpoint
    * @return View
    */
   public function getDatabaseInfo()
   {    
       $functions = $this->queryFunctions->getFunctions();
       $activeFunctions = $this->queryLockFunctions->getLockFunctions(); 
       
       return view('database', compact('functions', 'activeFunctions'));
   }

   
   public function store()
   {
       $query = $this->updateFunctions->setFunctions(request('function')); 
       $functions = $this->queryFunctions->getFunctions();
       $activeFunctions = $this->queryLockFunctions->getLockFunctions();
       
       return view('database', Compact('functions', 'activeFunctions'));
   }
    
}
