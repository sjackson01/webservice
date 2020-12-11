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
	 * 
	 * @return Client
	 */
	public function down()
	{
		return $this->client->request('GET', env('DOWN_URL') . 'enrollment');
	}

	/**
	 * 
	 * @return Client
	 */
	public function up($url)
	{
		return $this->client->request('GET', $url);
	}

	/**
	 *  
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
	 *  
	 * @return Status 
	 */
	public function getUpStatus()
	{	
		return $this->responseHandler(self::up(env('UP_URL'))->getStatusCode());
	}

	/**
	 *  
	 * @return Version 
	 */
	public function getUpVersion()
	{
		return $this->responseHandler(self::up(env('UP_URL'))->getProtocolVersion());
    }
    
    /**
	 *  
	 * @return Status 
	 */
	public function getDownStatus()
	{	
		return $this->responseHandler(self::down()->getStatusCode());
	}

	/**
	 *  
	 * @return Version 
	 */
	public function getDownVersion()
	{
		return $this->responseHandler(self::down()->getProtocolVersion());
	}

}