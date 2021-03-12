<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request; 
use App\Util\Reader;
use App\Util\Writer;
use App\Util\Down; 

class FunctionController extends Controller
{

    protected $selectFunctions;
    protected $selectLockFunctions;
    protected $selectLockId;
    protected $insertFunctions;
    protected $deleteFunctions;
    protected $parameters;


   /**
    * Class constructor.
    * Initialize an instance of 
    * FunctionController Object 
    */
    public function __construct(Reader $selectFunctions, Reader $selectLockFunctions, Reader $selectLockId, Writer $insertFunctions , Writer $deleteFunctions, Down $parameters)
    {   
        $this->selectFunctions = $selectFunctions;
        $this->selectLockFunctions = $selectLockFunctions;
        $this->selectLockId =  $selectLockId; 
        $this->insertFunctions = $insertFunctions;
        $this->deleteFunctions = $deleteFunctions;
        $this->parameters = $parameters; 

    }

   /**
    * Query select data and return
    * data with view
    * @return View
    */
    public function selection()
    {    

        try
        {
            $parameters =  $this->parameters->getParameters();  
            $functions = $this->selectFunctions->selectFunctions();
            $lockIds = $this->selectLockId->selectLockIds(); 
            $activeFunctions = $this->selectLockFunctions->selectLockFunctions();
        
            return view('functions', compact('functions', 'activeFunctions', 'lockIds', 'parameters'));
        }

        catch (ConnectException $e)
        {
            $functions = $this->selectFunctions->selectFunctions();
            $lockIds = $this->selectLockId->selectLockIds(); 
            $activeFunctions = $this->selectLockFunctions->selectLockFunctions();
        
            return view('functions', compact('functions', 'activeFunctions', 'lockIds'));
        }
    }

   /**
    * Query insert data and return
    * select data with view
    * @return View
    */
    public function add()
    {
        $query = $this->insertFunctions->insertFunctions(request('function')); 
        return FunctionController::selection(); 
    }

   /**
    * Query delete data and return
    * select data with view
    * @return View
    */
    public function remove()
    {
        $query = $this->deleteFunctions->deleteFunctions(number_format(request('lockId'))); 
        return FunctionController::selection();
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
            return FunctionController::add();
        }
        elseif($request->lockId)
        {
            return FunctionController::remove();
        }
        else
        {
            return FunctionController::selection();  
        }

    }
}