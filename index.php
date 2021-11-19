<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

include "lib/AddressBook.php";
$currentPath = __DIR__;
$pathToData = "{$currentPath}/data";
$pathToClasses = "{$currentPath}/lib";

//echo "<pre>";
echo "<div>I'm : {$currentPath}<br></div>";
echo "<div>I'm : {$pathToData}<br></div> ";
echo "<div>I'm : {$pathToClasses}<br></div>";

$ab = new AddressBook($pathToData);
$ab->findAllPersonsByCityId(2);
print_r($ab->findAddressWithName("Ararat"));

echo "Another awesome string<br>";
