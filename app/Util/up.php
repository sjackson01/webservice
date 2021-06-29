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

		$column = array_search('col1', $data); // Select active column header 

		while(! feof($open)){
    		$columnValues[] = fgetcsv($open)[$column]; // Insert column values into array 
		}

        return $columnValues; // Return csv values

		fclose($open); // Close file 
	}
    
   /**
    * Combine query 
    * results into url 
    * @return Array 
    */
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
            $wsformat = '&moodlewsrestformat='; // Format string
            $format = $this->selectMoodleUrl()->format; // Format 

            $paramStrings = $this->selectParamStrings($value->functions); // Select active function strings

            foreach($paramStrings as $index=>$data){ // Get parameter strings 
                $strings = $data; 
            }

            $url = $moodleUrl.$wstoken.$token.$wsfunction.$function; // Assemble url

            if(isset($value->parameter1))
            {
			    $csvValue = $this->getCsvParameters($value->parameter1); // Get csv value
                
                $url .= $strings->paramstring1; // Add string
                $url .= $csvValue[0]; // Add csv value
            }

            if(isset($value->parameter2))
            {   
                $csvValue = $this->getCsvParameters($value->parameter2); 

                $url .= $strings->paramstring2; // Add string
                $url .= $csvValue[1]; // Add csv value
            }
            
            if(isset($value->parameter3))
            {
                $csvValue = $this->getCsvParameters($value->parameter3); 

                $url .= $strings->paramstring3; // Add string
                $url .= $csvValue[2]; // Add csv value
            }

            if(isset($value->paramter4))
            {
                $csvValue = $this->getCsvParameters($value->parameter4); 

                $url .= $strings->paramstring4; // Add string
                $url .= $csvValue[3]; // Add csv value
            }

            if(isset($value->parameter5))
            {
                $csvValue = $this->getCsvParameters($value->parameter5); 

                $url .= $strings->paramstring5; // Add string
                $url .= $csvValue[4]; // Add csv value
            }

            if(isset($value->parameter6))
            {
                $csvValue = $this->getCsvParameters($value->parameter6); 
                
                $url .= $strings->paramstring6; // Add string
                $url .= $csvValue[5]; // Add csv value 
            }
            
            if(isset($url))
            {
                $url .= $wsformat.$format; // Add format 
            }

            $requestUrl = explode(',',$url); // Convert url to array

            foreach($requestUrl as $array) // Add urls to array 
            {
                $requestUrls[] = $array; 
            }
           
            return $requestUrls; // Return request urls array 
        }
    
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
   

