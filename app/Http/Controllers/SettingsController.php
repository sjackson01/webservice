<?php

namespace App\Http\Controllers;
use App\Util\Reader;


class SettingsController extends Controller
{
    protected $moodleUrl; 

    /**
    * Class constructor.
    * Initialize an instance of 
    * SettingsController Object 
    */
    public function __construct(Reader $moodleUrl)
    {
        $this->moodleUrl = $moodleUrl; 
    }

    public function selectUrl()
    {
        $moodleUrl = $this->moodleUrl->selectMoodleURL();

        return view('settings', compact('moodleUrl'));
    }
    

}
