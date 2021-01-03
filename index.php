<?php
session_start();
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_9f21e82fef4028347acd48848cd",
                  "X-Auth-Token:test_f3b875286e3b588c6f27e41bd9b"));
$payload = Array(
    'purpose' => 'For ecommerce',
    'amount' => '10',
    'phone' => '9999999999',
    'buyer_name' => 'shahbaz',
    'redirect_url' => 'http://localhost/instamojo/redirect.php',
    'send_email' => true,
    'send_sms' => true,
    'email' => 'shahbazh568@gmail.com.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

// echo $response;

$response = json_decode($response);

// echo "<pre>";
// print_r($response);

$_SESSION['TID'] = $response->payment_request->id;
header('location:'.$response->payment_request->longurl);
die();
?>