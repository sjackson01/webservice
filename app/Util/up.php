<?php

namespace App\Util;

class Up Extends Transfer
{

   /**
	*  
	* @return string 
	*/
	public function getRoleId()
	{
		$params = $this->responseHandler(self::down()->getBody());
		return $roleId = "&enrolments[0][roleid]=" . $params[0]['roleId'];
	}

   /**
	*  
	* @return string 
	*/
	public function getUserId()
	{
		$params = $this->responseHandler(self::down()->getBody());
		return $userId = "&enrolments[0][userid]=" . strval($params[0]['userId']);
	}

   /**
	*  
	* @return string
	*/
	public function getCourseId()
	{
		$params = $this->responseHandler(self::down()->getBody());
		return $courseId = "&enrolments[0][courseid]=" . strval($params[0]['courseId']);
	}

   /**
	*  
	* @return string
	*/
	public function urlBuilderEnrol()
	{
		$url = env('TEST_URL_ENROL');
		$paramters = $this->getRoleId() . $this->getUserId() . $this->getCourseId();
		return $call = $url . $paramters;
	
	}

   /**
	*  
	* @return string
	*/
	public function urlBuilderUnenrol()
	{
		$url = env('TEST_URL_UNENROL');
		$paramters = $this->getRoleId() . $this->getUserId() . $this->getCourseId();
		return $call = $url . $paramters;
	
	}	

   /**
	*  
	* @return Body 
	*/
	public function manualEnrol()
	{
		return $this->responseHandler(self::up($this->urlBuilderEnrol())->getBody());
	}

   /**
	*  
	* @return Body 
	*/
	public function manualUnenrol()
	{
		return $this->responseHandler(self::up($this->urlBuilderUnenrol())->getBody());
	}

}