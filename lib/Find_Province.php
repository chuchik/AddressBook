<?php

class Find_Province extends AddressBook
{
    public function findProvinceWithId(int $id) :?Province{
        foreach ($this->provinces as $province){
            if ($province->getId() === $id){
                return $province;
            }
        }
        return null;
    }
}