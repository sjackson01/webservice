<?php

namespace App\Util;

class Up Extends Transfer
{

   /**
	* Add enrolment info recieved from
	* external API to endpoint request 
	* @return string 
	*/
	public function getRoleId()
	{
		$params = $this->responseHandler(self::down()->getBody());
		return $roleId = "&enrolments[0][roleid]=" . $params[0]['roleId'];
	}

   /**
	* Add enrolment info recieved from
	* external API to endpoint request 
	* @return string 
	*/
	public function getUserId()
	{
		$params = $this->responseHandler(self::down()->getBody());
		return $userId = "&enrolments[0][userid]=" . strval($params[0]['userId']);
	}

   /**
	* Add enrolment info recieved from
	* external API to endpoint request 
	* @return string
	*/
	public function getCourseId()
	{
		$params = $this->responseHandler(self::down()->getBody());
		return $courseId = "&enrolments[0][courseid]=" . strval($params[0]['courseId']);
	}

   /**
	* Construct endpoint request 
	* @return string
	*/
	public function urlBuilderEnrol()
	{
		$url = env('TEST_URL_ENROL');
		$paramters = $this->getRoleId() . $this->getUserId() . $this->getCourseId();
		return $call = $url . $paramters;
	
	}

   /**
	* Construct endpoint request
	* @return string
	*/
	public function urlBuilderUnenrol()
	{
		$url = env('TEST_URL_UNENROL');
		$paramters = $this->getRoleId() . $this->getUserId() . $this->getCourseId();
		return $call = $url . $paramters;
	
	}	

   /**
	* Send endpoint request 
	* @return Body 
	*/
	public function manualEnrol()
	{
		return $this->responseHandler(self::up($this->urlBuilderEnrol())->getBody());
	}

   /**
	* Send endpoint request 
	* @return Body 
	*/
	public function manualUnenrol()
	{
		return $this->responseHandler(self::up($this->urlBuilderUnenrol())->getBody());
	}

}