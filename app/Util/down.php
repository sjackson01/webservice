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

}