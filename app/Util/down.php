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
		$bodyDown = $this->responseHandler(self::down()->getBody());

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
		$bodyDown = $this->responseHandler(self::down()->getBody());

		foreach($bodyDown[0] as $array=>$key)
		{
            $value[] = $key; 
		}

		return $value; 

	}

}