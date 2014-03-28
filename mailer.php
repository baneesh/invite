<?php

$url = 'https://api.sendgrid.com/';
$user = 'app23344675@heroku.com';
$pass = 'sl500hn0';
$name=$_POST['name'];
$email=$_POST['email'];
$guests=$_POST['guests'];
$body= "Name: " . $name . "\r\nNumber of Guests: " . $guests;
$body1= "Hi " . $name . ",\r\nThanks for your RSVP. We look forward to seeing you there. \r\nPlease find the event details below.\r\n\r\nDate: June 14th, 2014\r\nLocation: PV Bay Club, 32821 Seagate Dr., Rancho Palos Verdes, California 90275\r\nTime: 4pm\r\n\r\nYou have confirmed for  ". $guests . " guest(s). Please email us back with any questions or changes.\r\nSee you Soon!\r\nAjay and Kirti Seth";

//self mail

$params = array(
    'api_user'  => $user,
    'api_key'   => $pass,
    'to'        => 'baneesh87@gmail.com',
    'subject'   => 'RSVP Confirmation',
    'html'      => $body,
    'text'      => $body,
    'from'      => $email,
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

// user mail

$params1 = array(
    'api_user'  => $user,
    'api_key'   => $pass,
    'to'        => $email,
    'subject'   => 'Thanks for your RSVP!',
    'html'      => $body1,
    'text'      => $body1,
    'from'      => 'baneesh87@gmail.com',
  );


$request1 =  $url.'api/mail.send.json';

// Generate curl request
$session1 = curl_init($request1);
// Tell curl to use HTTP POST
curl_setopt ($session1, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session1, CURLOPT_POSTFIELDS, $params1);
// Tell curl not to return headers, but do return the response
curl_setopt($session1, CURLOPT_HEADER, false);
curl_setopt($session1, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response1 = curl_exec($session1);
curl_close($session1);

// print everything out
print_r($response1);

?>