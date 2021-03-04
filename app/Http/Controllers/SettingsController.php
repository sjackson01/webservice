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

    public function select()
    {
        $moodleUrl = $this->moodleUrl->selectMoodleUrl();
        $sourceUrl = $this->sourceUrl->selectSourceUrl();

        return view('settings', compact('moodleUrl', 'sourceUrl'));
    }

   /**
    * Query insert data and return
    * select data with view
    * @return View
    */
    public function add()
    {
        $this->updateMoodleUrl->updateMoodleUrl(request('moodle_url'));
        $this->updateMoodleToken->updateMoodleToken(request('moodle_token'));
        $this->updateSourceUrl->updateSourceUrl(request('source_url'));
        $this->updateSourceToken->updateSourceToken(request('source_token'));

        return settingsController::select(); 
    }
    

}
