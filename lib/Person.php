<?php

class Person
{
    protected $id = 0;
    protected $name = "";

    protected $addressId = 0;
    protected $cityId = 0;
    protected $provinceId = 0;

    public $address = null;


    public function __construct(array $params = [], $address = null){
        if(!empty($params)) {
            $this->id = $params['id'];
            $this->name = $params['name'];

            $this->addressId = $params['address_id'];
            $this->cityId = $params['city_id'];
            $this->provinceId = $params['province_id'];
            $this->address = $address;
        }
    }

    public function getId() :int {
        return $this->id;
    }

    /**
     * @return mixed|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed|string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|mixed
     */
    public function getAddressId()
    {
        return $this->addressId;
    }

    /**
     * @param int|mixed $addressId
     */
    public function setAddressId($addressId): void
    {
        $this->addressId = $addressId;
    }

    /**
     * @return int|mixed
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * @param int|mixed $cityId
     */
    public function setCityId($cityId): void
    {
        $this->cityId = $cityId;
    }

    /**
     * @return int|mixed
     */
    public function getProvinceId()
    {
        return $this->provinceId;
    }

    /**
     * @param int|mixed $provinceId
     */
    public function setProvinceId($provinceId): void
    {
        $this->provinceId = $provinceId;
    }

}
