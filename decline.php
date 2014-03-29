<?php

$url = 'https://api.sendgrid.com/';
$user = 'app23344675@heroku.com';
$pass = 'sl500hn0';
$name=$_POST['name'];

$body= "Name: " . $name . " can't make it";

//self mail

$params = array(
    'api_user'  => $user,
    'api_key'   => $pass,
    'to'        => 'baneesh87@gmail.com',
    'subject'   => 'RSVP Declined',
    'html'      => $body,
    'text'      => $body,
    'from'      => 'baneesh87@gmail.com',
  );


$request =  $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);
curl_close($session);

// print everything out
print_r($response);



?>