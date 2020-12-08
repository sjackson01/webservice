<?php

namespace App\Util;

class Down extends Transfer
{
	/**
	*  
	* @return Body 
	*/
	public function getBodyDown()
	{
		return $this->responseHandler(self::down()->getBody());
	}

}