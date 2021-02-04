<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use App\Util\Reader;
use App\Util\Writer;

class DatabaseController extends Controller
{

    protected $queryFunctions;
    protected $queryLockFunctions;
    protected $queryLockId; 
    protected $addFunctions;
    protected $removeFunctions;  

    /**
    * Class constructor.
    *
    */
    public function __construct(Reader $queryFunctions, Reader $queryLockFunctions, Reader $queryLockId, Writer $addFunctions , Writer $removeFunctions)
    {   
        $this->queryFunctions = $queryFunctions;
        $this->queryLockFunctions = $queryLockFunctions;
        $this->queryLockId =  $queryLockId; 
        $this->addFunctions = $addFunctions;
        $this->removeFunctions = $removeFunctions;

    }

    /**
    * Return view and data from endpoint
    * @return View
    */
    public function getDatabaseInfo()
    {    
        $functions = $this->queryFunctions->getFunctions();
        $lockIds = $this->queryLockId->getLockIds(); 
        $activeFunctions = $this->queryLockFunctions->getLockFunctions(); 
        
        return view('database', compact('functions', 'activeFunctions', 'lockIds'));
    }

    public function add()
    {
        $query = $this->addFunctions->setFunctions(request('function')); 
        $functions = $this->queryFunctions->getFunctions();
        $lockIds = $this->queryLockId->getLockIds(); 
        $activeFunctions = $this->queryLockFunctions->getLockFunctions();
        
        return view('database', Compact('functions', 'activeFunctions', 'lockIds'));
    }

    public function remove()
    {
        $query = $this->removeFunctions->deleteFunctions(number_format(request('lockId'))); 
        $functions = $this->queryFunctions->getFunctions();
        $lockIds = $this->queryLockId->getLockIds(); 
        $activeFunctions = $this->queryLockFunctions->getLockFunctions();
        
        return view('database', Compact('functions', 'activeFunctions', 'lockIds'));
    }

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
            return DatabaseController::getDatabaseInfo();  
        }

    }
}