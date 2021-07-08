<?php

namespace App\Util;
use Illuminate\Support\Facades\DB;

class Up Extends Transfer
{
   /**
    * Return current 
    * moodle url 
    * @return Query 
    */
    public function selectMoodleUrl()
    {
        return DB::table('settings')->first();
    }

   /**
    * Return active 
    * functions 
    * @return Query 
    */
    public function selectActiveFunctions()
    {
        return DB::table('lock')->get();
    }

    /**
    * Return rest  
    * parameter strings
    * @return Query 
    */

    public function selectParamStrings($function)
    {
        return DB::table('functions')->where('functions', '=', $function)->get();
    }

    
   /**
    * Organize CSV rows
    * into columns 
    * @return Array  
    */

    public function arrayMapper($array, $index)
    {
       array_pop($array); // Remove null 

       foreach($array as $key) // Get array keys
       {
           $keys[] = $key; 
       }

       $exteriorCount = count($keys); // Count top level elements
       
       foreach($array as $k => $v)// Get array values
       {
           $var[] = $v; 
       }

       $interiorCount = count($var, 1) - $exteriorCount; // Count Interior Elements  


       $single = array_reduce($array, 'array_merge', array());// Creat single array from multi

       $columnHeight = round($interiorCount/$exteriorCount); // Get interior array height

       $i=0; 
       
       foreach($single as $value) { // Move rows into columns
            if ($i++ % $columnHeight == $index) {
                $result[] = $value;
            }         
       }
       return $result; 
    }

    /**
	 * Return csv values
	 * @return array
	 */
	public function getCsvParameters($columnHeader)
	{
		$directory = '../public/uploads/'; // File Directory 

		$file = scandir($directory, 1); // Get file 

		$open = fopen($directory.$file[0],"r"); // Open File 

		$csv = fgetcsv($open); // Parse File 

		foreach($csv as $key => $value) {
    		$data[] = $value; // Insert columns headers into array
		}

        while(! feof($open)){
    		$array[] = fgetcsv($open); // Convert CSV to array
		}

		$index = array_search($columnHeader, $data); // Select active column header 

        if($index === false) // Change false return to 0 
        {
            $index = 0; 
        } 

		$result = $this->arrayMapper($array, $index); // Convert CSV rows to columns  

        return $result; // Return csv values

		fclose($open); // Close file 
	}

    public function urlBuilder()
    {
        
        $activeFunctions = $this->selectActiveFunctions();

        foreach($activeFunctions as $key=>$value)
        {   
            $moodleUrl = $this->selectMoodleURL()->url; // Url 
            $wstoken = '?wstoken='; // Token string
            $token = $this->selectMoodleUrl()->token; // Token
            $wsfunction = '&wsfunction='; // Function string
            $function = $value->functions; // Function
            
            $url = $moodleUrl.$wstoken.$token.$wsfunction.$function; // Assemble url
        }
        return $url; 
    }

    
   /**
    * Combine query 
    * results into url 
    * @return Array 
    */
    public function paramBuilder()
    {
        $activeFunctions = $this->selectActiveFunctions();

        foreach($activeFunctions as $key=>$value)
        { 
            $paramStrings = $this->selectParamStrings($value->functions); // Select active function strings
        }

        foreach($paramStrings as $index=>$data){ // Get parameter strings 
            $strings = $data; 
        }
            
        $count = $this->getCsvParameters($value->parameter1); // Get array 

        $height = count($count); // Find array length
        
        for($i = 0; $i < $height; $i++){
        
            $url = $this->urlBuilder(); // Get base url 
        
            if(isset($value->parameter1))
            {
			    $csvValue = $this->getCsvParameters($value->parameter1); // Get csv value

                $url .= $strings->paramstring1.$csvValue[$i]; // Add string and csv value
            }

            if(isset($value->parameter2))
            {
			    $csvValue = $this->getCsvParameters($value->parameter2); // Get csv value

                $url .= $strings->paramstring2.$csvValue[$i]; // Add string and csv values
            }
            
            if(isset($value->parameter3))
            {
			    $csvValue = $this->getCsvParameters($value->parameter3); // Get csv value
                
                $url .= $strings->paramstring3.$csvValue[$i]; // Add string and csv value
            }

            if(isset($value->parameter4))
            {
			    $csvValue = $this->getCsvParameters($value->parameter4); // Get csv value
                
                $url .= $strings->paramstring4.$csvValue[$i]; // Add string and csv value
            }
            
            if(isset($value->parameter5))
            {
			    $csvValue = $this->getCsvParameters($value->parameter5); // Get csv value
                
                $url .= $strings->paramstring5.$csvValue[$i]; // Add string and csv value
            }

            if(isset($value->parameter5))
            {
			    $csvValue = $this->getCsvParameters($value->parameter5); // Get csv value
                
                $url .= $strings->paramstring6.$csvValue[$i]; // Add string and csv value
            }

            if(isset($value->parameter6))
            {
			    $csvValue = $this->getCsvParameters($value->parameter6); // Get csv value
                
                $url .= $strings->paramstring6.$csvValue[$i]; // Add string and csv value
            }

            $wsformat = '&moodlewsrestformat='; // Format string

            $format = $this->selectMoodleUrl()->format; // Format 

            $url .= $wsformat.$format; // Add return format

            $send[] = $url; // Add url to string
            
            unset($url); // Unset working variable for 
        }
       return $send; 
    }  
    

   /**
    * Send requests  
    * @return Response 
    */
    public function sendData()
    {   
        foreach($this->urlBuilder() as $request)
        { 
            return $this->responseHandler(self::up($request)->getBody()); // Loop send requests
        }
    }
}
   

