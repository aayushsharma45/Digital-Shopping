<?php
session_start();
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        "X-Api-Key:test_362f06c04eed8b4c1bf0e016713",
        "X-Auth-Token:test_1ec9696c2343d30a256d372f33c"
    )
);
$payload = array(
    'purpose' => 'Buy domain name',
    'amount' => '2500',
    'phone' => '9854623559',
    'buyer_name' => 'John Doe',
    'redirect_url' => 'http://localhost/finalyear/instamojo/redirect.php',
    'send_email' => true,
    'send_sms' => true,
    'email' => 'sarveshthakur0412@gmail.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch);
$response = json_decode($response);
echo '<pre>';

$_SESSION['TID'] = $response->payment_request->id;
header('location:' . $response->payment_request->longurl);
die();
