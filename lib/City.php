<?php

class City
{
    const BIG_CITY = 1000000;
    const VERY_SMALL_CITY = 10000;

    protected $name = "";
    protected $id = 0;
    protected $provinceId = 0;
    protected $population = 0;

    public $province = null;

    public function __construct(array $params)
    {
        if (!empty($params)) {
            $this->name = $params['name'];
            $this->id = $params['id'];
            $this->provinceId = $params['province_id'];
            $this->population = $params['population'];
        }
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return int|mixed
     */
    public function getProvinceId()
    {
        return $this->provinceId;
    }

    /**
     * @param int|mixed $cityId
     */
    public function setProvinceId($cityId): void
    {
        $this->provinceId = $cityId;
    }

    public function isBigCity() :bool {
        if($this->population >= self::BIG_CITY){
            return true;
        }
        return false;
    }

    public function getPopulation() :int {
        return $this->population;
    }
}