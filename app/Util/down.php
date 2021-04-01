<?php

namespace App\Util;

class Down extends Transfer
{

   /**
	* Return endpoint response
	* @return Body 
	*/
	public function getBodyDown()
	{
		return $this->responseHandler(self::down()->getBody());
	}

   /**
	* Return endpoint keys
	* @return array
	*/
	public  function getKey()
	{
		$bodyDown = $this->getBodyDown();

		foreach($bodyDown as $array)
		{
		  $key = array_keys($array);
		}

	    return $key;

	}
	
   /**
	* Return endpoint values
	* @return array
	*/
	public function getValue()
	{
		$bodyDown = $this->getBodyDown();

		foreach($bodyDown[0] as $array=>$key)
		{
            $value[] = $key; 
		}

		return $value; 

	}

   /**
	* Return endpoint keys
	* @return array
	*/
	public function getParameters()
	{
		 // Check if directory is empty 
		 if((count(scandir('../public/uploads')) <= 2)){
				
				// Get values from rest end point 
				$keys = $this->getKey();
				$values =  $this->getValue();

				return array_merge($keys, $values);
		 }else{	
			
			// Convert csv to array
			$csv = array_map("str_getcsv", file("../public/uploads/test.csv")); 
			
			// Insert first row into array
			foreach ($csv[0] as $row){      
 				$keys[] = $row; 
			}

			// Return array 
			return $keys;
			}
		}
	} 