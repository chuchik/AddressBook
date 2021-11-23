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

    /**
     * @param int $city_id
     * @return Person[]|null
     */
    public function findAllPersonsByCityId(int $city_id) :?array{
        $persons_by_city = [];
        foreach ($this->persons as $person){
            if($person->getCityId() === $city_id){
                $persons_by_city[] = $person;
                return $persons_by_city;
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

    public function findAddressWithId(int $id) :?Address{
        foreach ($this->addresses as $address){
            if ($address->getId() === $id){
                return $address;
            }
        }
        return null;
    }

    public function findAddressWithName(string $name) :?Address{
        foreach ($this->addresses as $address){
            print_r(strpos($address->getName(),$name ));
            if (strpos($address->getName(),$name ) !== false){
                return $address;
            }
        }
        return null;
    }

    public function findAddressWithCityId(int $city_id) :?Address{
        foreach ($this->addresses as $address){
            if ($address->getCityId() === $city_id){
                return $address;
            }
        }
        return null;
    }

    public function getCities() :array {
        foreach ($this->cities as $city) {
            $city->province = $this->getProvinceById($city->getProvinceId());
        }
        return $this->cities;
    }
    public function getPersons() :array{
        foreach ($this->persons as $person){
            $person->city = $this->getCityById($person->getCityId());
            $person->province = $this->getProvinceById($person->getProvinceId());
            $person->address = $this->getAddressById($person->getAddressId());
        }
        return  $this->persons;
    }
    public function getAddresses() :array{
        foreach ($this->addresses as $address){
            $address->city = $this->getCityById($address->getCityId());
        }
        return $this->addresses;
    }
    public function getProvinces() :array{
        return $this->provinces;
    }
    public function getCityWithName(string $name) :?City{
        foreach ($this-> cities as $city){
            if (strpos($city->getName(), $name) !=false){
                return $city;
            }

        }
        return null;
    }
    public function getPersonWithProvinceId(int $province_id) :?Person{
        foreach ($this->persons as $person){
            if($person->getProvinceId() === $province_id  ){
                return $person;
            }
        }
        return null;
    }
    public function getPersonWithCityId(int $city_id) :?Person{
        foreach ($this->persons as $person){
            if ($person->getCityId() === $city_id){
                return $person;
            }
        }
        return null;
    }
    public function getPersonWithName(string $name) :?Person{
        foreach ($this->persons as $person){
            if (strpos(strtolower($person->getName()), strtolower($name)) !== false){
                return $person;
            }
        }
        return null;
    }
    public function getPersonWithAddressId(int $address_id) :?Person{
        foreach ($this->persons as $person){
            if ($person->getAddressId() === $address_id){
                return $person;
            }
        }
        return null;
    }
    public function getProvinceWithId(int $id) :?Province{
        foreach ($this->provinces as $province){
            if ($province->getId() === $id){
                return $province;
            }
        }
        return null;
    }
    public function getProvinceWithName(string $name) :?Province{
        foreach ($this->provinces as $province){
            if (strpos($province->getName(), $name) !=false){
                return $province;
            }
        }
        return null;
    }
    public function getProvinceById(int $id) :Province {
        return $this->provinces[$id];
    }
    public function getCityById(int $city_id) :City{
        return $this->cities[$city_id];
    }
    public function getAddressById(int $address_id) :Address{
        return $this->addresses[$address_id];
    }

}