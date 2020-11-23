<?php
namespace App\Util;

use GuzzleHttp\Client;

class Receive
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
	public function request()
	{
		return $this->client->request('GET', 'employees');
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
	public function getStatus()
	{	
		return $this->responseHandler(self::request()->getStatusCode());
	}

     /**
	 *  
	 * @return Body 
 	 */
	public function getBody()
	{
		return $this->responseHandler(self::request()->getBody());
	}

     /**
	 *  
	 * @return Version 
 	 */
	public function getVersion(){

		return $this->responseHandler(self::request()->getProtocolVersion());

	}
 
}