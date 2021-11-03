<?php

$provinces = include "data/provinces.php";
$cities = include "data/cities.php";
$addresses = include "data/addresses.php";
$persons = include "data/persons.php";

include "classes/classess.php";
$addresses = new addresses();
$persons = new persons();
$addresses->getAddress();
$persons->getPersons();

//include "functions/global.php";
//echo "<pre>";
//echo sizeof($persons), "<br>";


//getRegions($provinces);
//getCities($provinces, $cities);
//getAddresses($cities, $addresses);
//getPersons($addresses, $persons);
//$chuch = getPersonsByName($persons, $addresses, $cities, "pet");
//print_r($chuch);
//echo "Awesome project";