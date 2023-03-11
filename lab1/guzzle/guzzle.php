<?php
require_once("./config.php");
require("./vendor/autoload.php");

if(isset($_POST['city'])){

   
    $cityid = $_POST['city'];
    $api = __API . $cityid . __API_KEY;

    $client = new \GuzzleHttp\Client();

    $response = $client->request("GET",$api);

    $returnedData = json_decode($response->getBody(),true);


    showResults($returnedData);
}





