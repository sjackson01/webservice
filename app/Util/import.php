<?php

namespace App\Util;

class Import 
{

    /**
    * Copy file to upload directory
	* @return String 
	*/
    public function upload($request){
        
        $file = $request->file('csv');
    
        // Check if file submitted
        if(!is_null($file)){
            
            $destinationPath = 'uploads';
            
            $file->move($destinationPath,$file->getClientOriginalName());

        }else{

            // Display message if form submitted without choosing a file 
            return "Please choose a file to upload.";

        }
    }
}