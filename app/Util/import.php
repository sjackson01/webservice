<?php

namespace App\Util;

class Import 
{

   /**
    * Upload File 
	*/
    public function upload($request) {
        
        $file = $request->file('csv');
    
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());

    }

}