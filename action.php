<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

include "lib/AddressBook.php";
$currentPath = __DIR__;
$pathToData = "{$currentPath}/data";
$pathToClasses = "{$currentPath}/lib";
$ab = new AddressBook($pathToData);

$action = $_GET['action'];
$entity = $_GET['entity'];
$name = $_GET['name'];
$returnValues = [];
if($action === "find"){
    if($entity === "person") {
        $returnValues = $ab->getPersonWithName($name);
    }
}
print_r($returnValues);