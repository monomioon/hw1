<?php
    
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://movie-quote-api.herokuapp.com/v1/quote/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);

if (curl_errno($ch)) { 
    print curl_error($ch); 
 } 
curl_close($ch);

$data = json_encode($response);
echo $data;
?>
