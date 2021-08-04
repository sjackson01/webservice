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

            // Explore directory 
            $files = glob('../public/uploads/*'); 

            //  Iterate through files in directory
            foreach($files as $delete){ 
                if(is_file($delete)) {
                        // Delete all files in directory
                        unlink($delete); 
                }
            }   

            $destinationPath = 'uploads';
            
            // Upload new file 
            $file->move($destinationPath,$file->getClientOriginalName());

            // Set active file
            $active = scandir('../public/uploads', 1);

            // Convert to string 
            return $active[0];

        }else{

            // Display message if form submitted without choosing a file 
            return "Please choose a file to upload.";

        }
    }
}