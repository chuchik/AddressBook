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

}