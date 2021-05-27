<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    
	  public function sms_api($number,$message)
      {
         
       


          //step 1, get data, you can get these value from your database or any user submitted form.No need to urlencode here. Because it will send the data using POST method//

            //step 2, sendfunction//
           $to = $number;
           $token ="";
           $message = $message;

           $url = "http://api.greenweb.com.bd/api.php";


           $data= array(
             'to'=>"$to",
             'message'=>"$message",
             'token'=>"Your_token_number"
            ); // Add parameters in key value

           $ch = curl_init(); // Initialize cURL
           curl_setopt($ch, CURLOPT_URL,$url);
           curl_setopt($ch, CURLOPT_ENCODING, '');
           curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
           curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
           //echo "SMS Sent Successfully";
           $smsresult = curl_exec($ch);

	    }
	    public function otp_send($mobile_number)
	    {

	    	$otp=rand(1000,9999);

	    	$message="Your OTP is ".$otp;

	    	$this->sms_api($mobile_number,$message);


	    	return "OTP send successfully";

	    }


}
