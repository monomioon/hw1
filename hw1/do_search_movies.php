<?php
    require_once ("debug_to_console.php");

    function imdb(){
        $key = "k_i8fhtv7w";
        $query = urlencode($_GET["q"]);
        $curl = curl_init();
    
     curl_setopt_array($curl, array(
       CURLOPT_URL => "https://imdb-api.com/en/API/SearchMovie/".$key."/".$query,
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_ENCODING => "",
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 0,
       CURLOPT_FOLLOWLOCATION => true,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => "GET",
     ));
 
     $response = curl_exec($curl);
 
     curl_close($curl);
    
     echo $response;

    }

    imdb();

      ?>