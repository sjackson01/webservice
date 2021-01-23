<?php

namespace App\Util;

class Up Extends Transfer
{
	/**
	*  
	* @return Body 
	*/
	public function manualEnrol()
	{
		return $this->responseHandler(self::up(env('TEST_URL_ENROL'))->getBody());
	}

	/**
	*  
	* @return Body 
	*/
	public function manualUnenrol()
	{
		return $this->responseHandler(self::up(env('TEST_URL_UNENROL'))->getBody());
	}



}