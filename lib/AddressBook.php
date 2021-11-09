<?php
include "Address.php";
include "Person.php";
include "City.php";
include "Province.php";

class AddressBook
{
    protected $provinces = [];
    protected $cities = [];
    protected $addresses = [];
    protected $persons = [];

    public function __construct(string $pathToData){
        echo "<pre>";
        $addresses = include "{$pathToData}/addresses.php";
        foreach ($addresses as $address) {
            $this->addresses[$address['id']] = new Address($address);
        }

        $persons = include "{$pathToData}/persons.php";
        foreach ($persons as $person) {
            $this->persons[$person['id']] = new Person($person, $this->addresses[$person['address_id']]);
        }
        $cities = include "{$pathToData}/cities.php";
        foreach ($cities as $city) {
            $this->cities[$city['id']] = new City($city);
        }
        $provinces = include "{$pathToData}/provinces.php";
        foreach ($provinces as $province) {
            $this->provinces[$province['id']] = new Province($province);
        }
    }
}