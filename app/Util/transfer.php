<?php

namespace App\Util;

use GuzzleHttp\Client;

class Transfer extends Reader
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
		return $this->client->request('GET', Reader::selectSourceUrl()->url);
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

}