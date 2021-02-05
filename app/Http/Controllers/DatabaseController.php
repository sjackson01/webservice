<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use App\Util\Reader;
use App\Util\Writer;

class DatabaseController extends Controller
{

    protected $selectFunctions;
    protected $selectLockFunctions;
    protected $selectLockId; 
    protected $insertFunctions;
    protected $removeFunctions;  

    /**
    * Class constructor.
    * Initialize an instance of 
    * DatabaseController Object 
    */
    public function __construct(Reader $selectFunctions, Reader $selectLockFunctions, Reader $selectLockId, Writer $insertFunctions , Writer $deleteFunctions)
    {   
        $this->selectFunctions = $selectFunctions;
        $this->selectLockFunctions = $selectLockFunctions;
        $this->selectLockId =  $selectLockId; 
        $this->insertFunctions = $insertFunctions;
        $this->deleteFunctions = $deleteFunctions;

    }

    /**
    * Query select data and return
    * data with view
    * @return View
    */
    public function selection()
    {    
        $functions = $this->selectFunctions->selectFunctions();
        $lockIds = $this->selectLockId->selectLockIds(); 
        $activeFunctions = $this->selectLockFunctions->selectLockFunctions(); 
        
        return view('database', compact('functions', 'activeFunctions', 'lockIds'));
    }

    /**
    * Query insert data and return
    * select data with view
    * @return View
    */
    public function add()
    {
        $query = $this->insertFunctions->insertFunctions(request('function')); 
        return DatabaseController::selection(); 
    }

    /**
    * Query delete data and return
    * select data with view
    * @return View
    */
    public function remove()
    {
        $query = $this->deleteFunctions->deleteFunctions(number_format(request('lockId'))); 
        return DatabaseController::selection();
    }

    /**
    * Return view and data 
    * based on form request 
    * @return View
    */
    public function handleData(Request $request)
    {
        if($request->function)
        {
            return DatabaseController::add();
        }
        elseif($request->lockId)
        {
            return DatabaseController::remove();
        }
        else
        {
            return DatabaseController::selection();  
        }

    }
}