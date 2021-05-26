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

			$url = [$moodleUrl.$wstoken.$token.$wsfunction.$function.$wsformat.$format]; // Assemble url 
		
			foreach($url as $value)
			{
				$requestUrls[] = $value; // Add urls to array
			}
		}
		return $requestUrls; 
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
   
