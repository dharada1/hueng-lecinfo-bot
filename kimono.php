<?php
require_once('config.php');
//get JSON from kimono API

$request = KIMONO_API_URL;
$response = file_get_contents($request);
$lecinfo = json_decode($response, TRUE);
