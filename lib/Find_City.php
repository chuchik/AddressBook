<?php

class Find_City extends AddressBook
{

    public function findCityWithId(int $id) :?City{
        foreach ($this->cities as $city){
            if ($city->getId() === $id){
                return $city;
            }
        }
        return null;
    }

    public function findCityWithName(int $name) :?City{
        foreach ($this->cities as $city){
            if ($city->getName() === $name){
                return $city;
            }
        }
        return null;
    }


}