<?php

namespace App\Util;
use GuzzleHttp\Client;

class Transfer 
{

   /**
	* Class constructor.
	*
	*/
	protected $client;

	public function __construct(Client $client)
	{ 
		$this->client = $client;
		
    }
    
    /**
	 * Send endpoint request 
	 * @return Client
	 */
	public function down()
	{
		return $this->client->request('GET', env('DOWN_URL') . 'test');
	}

	/**
	 * Send endpoint request 
	 * @return Client
	 */
	public function up($url)
	{
		return $this->client->request('GET', $url);
	}

	/**
	 * Decode response 
	 * @return array 
	 */
	public function responseHandler($response)
	{
		if ($response) {
			return json_decode($response, true); 
		}
		
		return [];
	}
	
	/**
	 * Check endpoint status 
	 * @return Status 
	 */
	public function getUpStatus()
	{	
		return $this->responseHandler(self::up(env('UP_URL'))->getStatusCode());
	}

	/**
	 * Check endpoint version  
	 * @return Version 
	 */
	public function getUpVersion()
	{
		return $this->responseHandler(self::up(env('UP_URL'))->getProtocolVersion());
    }
    
    /**
	 * Check endpoint status 
	 * @return Status 
	 */
	public function getDownStatus()
	{	
		return $this->responseHandler(self::down()->getStatusCode());
	}

	/**
	 * Check endpoint version  
	 * @return Version 
	 */
	public function getDownVersion()
	{
		return $this->responseHandler(self::down()->getProtocolVersion());
	}

}