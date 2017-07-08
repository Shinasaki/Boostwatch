<?php

    // get locale form cookie or ip
    /*if(!Cookie::get('Locale'))
    {
        $language = explode(',',Request::server('HTTP_ACCEPT_LANGUAGE'));
        $language = $language[0];
    }
    else
    {
        $language = Cookie::get('Locale');
    }


    // set locale
    if(!empty($language))
    {
        if($language == 'th-TH' || $language == 'th')
        {
            App::setLocale('th');
        }
        else
        {
            App::setLocale('en');
        }
    }
    else
    {
        App::setLocale('en');
    }
