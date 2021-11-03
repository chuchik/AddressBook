<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

include "lib/AddressBook.php";

$currentPath = __DIR__;
$pathToData = "{$currentPath}/data";
$pathToClasses = "{$currentPath}/lib";

echo "I'm : {$currentPath}<br>";
echo "I'm : {$pathToData}<br>";
echo "I'm : {$pathToClasses}<br>";

$ab = new AddressBook($pathToData);