<?php

namespace App\Util;

class Up Extends Transfer
{
	/**
	*  
	* @return Body 
	*/
	public function getBodyUp()
	{
		return $this->responseHandler(self::up()->getBody());
	}

}