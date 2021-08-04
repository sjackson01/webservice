<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Util\Import;

class ImportController extends Controller
{
    protected $properties;

   /**
    * Class constructor.
    * Initialize an instance of 
    * FunctionController Object 
    */
    public function __construct(Import $properties, Import $csv)
    {
        $this->properties = $properties;
    }
   
   /**
    * Upload file
    * @return View
    */
    public function import(Request $request)
    {
        $status = $this->properties->upload($request); 

        return view('import', compact('status'));
    }

}
