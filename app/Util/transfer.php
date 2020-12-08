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
		return $this->client->request('GET', env('DOWN_URL') . 'posts');
	}

	/**
	 * 
	 * @return Client
	 */
	public function up()
	{
		return $this->client->request('GET', env('UP_URL') . 'comments');
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
		return $this->responseHandler(self::up()->getStatusCode());
	}

	/**
	 *  
	 * @return Version 
	 */
	public function getUpVersion()
	{
		return $this->responseHandler(self::up()->getProtocolVersion());
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