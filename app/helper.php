<?php

use App\Models\Setting;

function get_config_new($parameter) 
{   
    $config_data = Setting::where('title', $parameter)->first()->value;
    
    return $config_data;
}

