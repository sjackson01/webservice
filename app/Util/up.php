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
    * Combine query 
	* results into url 
	* @return Array 
	*/
	public function urlBuilder()
	{

		$object = $this->selectActiveFunctions(); 

		foreach($object as $key=>$value)
		{	
			$moodleUrl = $this->selectMoodleURL()->url; // Url 
			$wstoken = '?wstoken='; // Token string
			$token = $this->selectMoodleUrl()->token; // Token
			$wsfunction = '&wsfunction='; // Function string
			$function = $value->functions; // Function
			$wsformat = '&moodlewsrestformat='; // Format string
			$format = $this->selectMoodleUrl()->format; // Format 

			
			$url = $moodleUrl.$wstoken.$token.$wsfunction.$function; // Assemble url
			
			
			if(isset($value->parameter1))
			{
				$url .= $value->parameter1; // Add parameter 
			}
			
			if(isset($value->parameter1))
			{
				$url .= $value->parameter1; // Add parameter 
			}
            
			if(isset($value->parameter3))
			{
				$url .= $value->parameter3; // Add parameter 
			}

			if(isset($value->parameter4))
			{
				$url .= $value->parameter4; // Add parameter 
			}

			if(isset($value->parameter5))
			{
				$url .= $value->parameter5; // Add parameter 
			}

			if(isset($value->parameter6))
			{
				$url .= $value->parameter6; // Add parameter 
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
			
		}

		return $requestUrls; // Return request urls array 
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
   
