<?php
// Get the PHP helper library from twilio.com/docs/php/install
// Loads the library
require "vendor/autoload.php";

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "AC4c8feb9d5cf9bdf01f0ddc14cf1ebff4";
$token = "8753f776199f99fce4ab3ee72edbc461";
// $sid = "{{account_sid}}";
// $token = "{{ auth_token }}";
$client = new Lookups_Services_Twilio($sid, $token);
// Make a call to the Lookup API
$number = $client->phone_numbers->get("085655009393");
// $number = $client->phone_numbers->get("+6285655009393");
echo "<pre>";
  print_r($number->international_format);
echo"</pre>";
exit();
// $number = $client->phone_numbers->get("15108675309");

// Print the nationally formatted phone number
echo $number->national_format . "\r\n"; // => (510) 867-5309
