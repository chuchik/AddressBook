<?php

class Find_person extends AddressBook
{
    public function findPersonWithId(int $id) :?Person {
        foreach ($this->persons as $person){
            if ($person->getId() === $id){
                return $person;
            }
        }
        return null;
    }

    public function findPersonWithName(int $name) :?Person{
        foreach ($this->persons as $person){
            if ($person->getName() === $name){
                return $person;
            }
        }
        return null;
    }

    public function findPersonWithAddressId(int $address_id) :?Person{
        foreach ($this->persons as $person){
            if ($person->getAddressId() === $address_id){
                return $person;
            }
        }
        return null;
    }

    public function findPersonWithCityId(int $city_id) :?Person{
        foreach ($this->persons as $person){
            if ($person->getCityId() === $city_id){
                return $person;
            }
        }
        return null;
    }

    public function findPersonWithProvinceId(int $province_id) :?Person{
        foreach ($this->persons as $person){
            if ($person->getProvinceId() === $province_id){
                return $person;
            }
        }
        return null;
    }

}