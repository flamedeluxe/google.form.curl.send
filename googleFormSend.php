<?php
        //values by POST
        $name = urlencode($_POST['name']);
        $phone = urlencode($_POST['phone']);

        //create array with values
        $somefields = array(
        	  'entry.1861788294'	 => $name,
        	  'entry.2060249163'	=> $phone,
        );

        //url of google form
        $link = 'https://docs.google.com/forms/d/1dhmf6V0_dFwSwoD4wN_i3KhhdqV4stYvoAHB7OMW3xc/formResponse?ifq&';

        //collect all values to string
        foreach($somefields as $key=>$value) { $fields_tostring .= $key.'='.$value.'&'; }
    	  rtrim($fields_tostring,'&');

        //add the submit to url
    	  $url = $link.$fields_tostring.'&submit=Submit';

        //initialize curl
    	  $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml','Accept-Charset: UTF-8'));

        curl_exec($ch);
