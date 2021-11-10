<?php
include "Address.php";
include "Person.php";
include "City.php";
include "Province.php";

class AddressBook
{
    const OWNER_NAME = "CHUCHIK_PAPA";
    /** @var Province[] */
    protected $provinces = [];
    /** @var City[] */
    protected $cities = [];
    /** @var Address[] */
    protected $addresses = [];
    /** @var Person[] */
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
        foreach ($provinces as $id => $province) {
            $this->provinces[$id] = new Province($province, $id);
        }
    }

    public function findPerson(int $id) :?Person {
        foreach ($this->persons as $person){
            if ($person->getId() === $id){
                return $person;
            }
        }
        return null;
    }

    public function showBigCities(){
        foreach ($this->cities as $city) {
            if($city->isBigCity()){
                print_r($city);
            }
        }
    }
}