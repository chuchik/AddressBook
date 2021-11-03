<?php

function getRegions(&$regions){
    echo "<table>";
    echo "<tr><td>ID</td><td>Name</td></tr>";
    foreach ($regions as $id => $region) {
        echo "<tr><td>{$id}</td><td>{$region}</td></tr>";
    }
    echo "</table>";
}

function getRegion(&$regions, $regionId){
    return $regions[$regionId];
}

function getCities(&$regions, &$cities){
    echo "<table>";
    echo "<tr><td>ID</td><td>Name</td><td>Region</td></tr>";
    foreach ($cities as $id => $city) {
        $regionName = getRegion($regions, $city['province_id']);
        echo "<tr><td>{$city['id']}</td><td>{$city['name']}</td><td>{$regionName}</td></tr>";
    }
    echo "</table>";
}

function getCity(&$cities, $city_id){
    foreach ($cities as $city) {
        if($city['id'] === $city_id){
            return $city;
        }
    }
    return [];
}

// function to get list of address
function getAddresses(&$cities, &$addresses){
    echo "<table>";
    echo "<tr><td>ID</td><td>Name</td><td>City</td></tr>";
    foreach ($addresses as $id => $address){
        $cityName = getCity($cities, $address['city_id']);
        echo "<tr><td>{$address['id']}</td><td>{$address['name']}</td><td>{$cityName}</td></tr>";
    }
    echo "</table>";

}
function getAddress(&$addresses, $address_id){
    foreach ($addresses as $address) {
        if($address['id'] === $address_id){
            return $address;
        }
    }
    return [];
}
// function to get list of persons
function getPersons(&$addresses, &$persons){
    echo "<table>";
    echo "<tr><td>ID</td><td>Name</td><td>Addresses</td></tr>";
    foreach ($persons as $id => $person){
        $addressName= getAddress($addresses, $person['address_id']);
        echo "<tr><td>{$person['id']}</td><td>{$person['name']}</td><td>{$addressName['name']}</td></tr>";
    }
    echo "</table>";

}
function getPerson(&$persons, $regionId){
    return $persons[$regionId];
}

function getPersonByName($persons, $addresses, $cities, $personName){
    // We want to find person by name and return details about name, address, city

    // firstly we should find person by name
    foreach ($persons as $index => $person) {
        if(strpos(strtolower($person['name']), strtolower($personName)) !== false){
            $person['city'] = getCity($cities, $person['city_id'])['name'];
            $person['address'] = getAddress($addresses, $person['address_id'])['name'];
            return $person;
        }
    }
    return [];
}

function getPersonsByName($persons, $addresses, $cities, $personName){
    // We want to find person by name and return details about name, address, city
    $personsf = [];
    // firstly we should find person by name
    foreach ($persons as $index => $person) {
        if(strpos(strtolower($person['name']), strtolower($personName)) !== false){
            $person['city'] = getCity($cities, $person['city_id'])['name'];
            $person['address'] = getAddress($addresses, $person['address_id'])['name'];
            $personsf[] = $person;
        }
    }
    return $personsf;
}