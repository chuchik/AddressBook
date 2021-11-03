<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

class addresses{
    public $id;
    public $name;
    public $city_id;

    public function getAddress(&$addresses, $address_id){
        foreach ($addresses as $address) {
            if($address['id'] === $address_id){
                return $address;
            }
        }
        return [];
    }
}

class persons{
    public $id;
    public $name;
    public $addreses_id;
    public $city_id;
    public $province_id;

    public function getPersons(&$addresses, &$persons){
        echo "<table>";
        echo "<tr><td>ID</td><td>Name</td><td>Addresses</td></tr>";
        foreach ($persons as $id => $person){
            $addressName= getAddress($addresses, $person['address_id']);
            echo "<tr><td>{$person['id']}</td><td>{$person['name']}</td><td>{$addressName['name']}</td></tr>";
        }
        echo "</table>";
    }
}
