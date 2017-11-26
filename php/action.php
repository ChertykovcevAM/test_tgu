<?php

require_once ("classes/city_to_database.class.php");

$name_city = $_POST['address_city'];
$latitude = $_POST['coordinate_latitude'];
$longitude = $_POST['coordinate_longitude'];

$NewRound = new city_to_database($name_city, $latitude, $longitude);

?>