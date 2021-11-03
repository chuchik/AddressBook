<?php
include "Address.php";
include "Person.php";

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
        print_r($this->persons);
        echo "This is the path of data folder<br>";
    }
}