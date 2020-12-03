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
	public function getStatus()
	{	
		return $this->responseHandler(self::down()->getStatusCode());
	}

    /**
	 *  
	 * @return Version 
	 */
	public function getVersion()
	{
		return $this->responseHandler(self::down()->getProtocolVersion());
	}

   /**
	*  
	* @return Body 
	*/
	public function getBodyUp()
	{
		return $this->responseHandler(self::up()->getBody());
	}

   /**
 	*  
 	* @return Body 
 	*/
	public function getBodyDown()
	{
		return $this->responseHandler(self::down()->getBody());
	}
 
}