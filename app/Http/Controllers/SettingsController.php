<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Util\Reader;
use App\Util\Writer;


class SettingsController extends Controller
{
    protected $moodleUrl; 
    protected $updateMoodleUrl;
    protected $updateMoodleToken; 
    protected $sourceUrl; 
    protected $updateSourceUrl;
    protected $updateSourceToken; 

   /**
    * Class constructor.
    * Initialize an instance of 
    * SettingsController Object 
    */
    public function __construct(Reader $moodleUrl, Writer $updateMoodleUrl, Writer $updateMoodleToken , Reader $sourceUrl , Writer $updateSourceUrl, Writer $updateSourceToken)
    {
        $this->moodleUrl = $moodleUrl; 
        $this->updateMoodleUrl = $updateMoodleUrl;
        $this->updateMoodleToken = $updateMoodleToken;
        $this->sourceUrl = $sourceUrl; 
        $this->updateSourceUrl = $updateSourceUrl;
        $this->updateSourceToken = $updateSourceToken; 

    }

   /**
    * Select active moodle url
    * @return View
    */
    public function selectMoodleURL()
    {
        $moodleUrl = $this->moodleUrl->selectMoodleUrl();

        return view('welcome', compact('moodleUrl'));
    }

   /**
    * Select active source url
    * @return View
    */
    public function selectEndpointURL()
    {
        $sourceUrl = $this->sourceUrl->selectSourceUrl();

        return view('endpoint', compact('sourceUrl'));
    }


   /**
    * Update moodle url 
    * and token 
    * @return View
    */
    public function addMoodleSettings()
    {
        $this->updateMoodleUrl->updateMoodleUrl(request('moodle_url'));
        $this->updateMoodleToken->updateMoodleToken(request('moodle_token'));

        return settingsController::selectMoodleURL(); 
    }

   /**
    * Update endpoint url 
    * and token
    * @return View
    */
    public function addEndpointSettings()
    {
        $this->updateSourceUrl->updateSourceUrl(request('source_url'));
        $this->updateSourceToken->updateSourceToken(request('source_token'));

        return settingsController::selectEndpointURL();     
    }

}
