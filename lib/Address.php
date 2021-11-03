<?php

class Address
{
    protected $name = "";
    protected $id = 0;
    protected $cityId = 0;

    public function __construct(array $params) {
        if(!empty($params)){
            $this->name = $params['name'];
            $this->id = $params['id'];
            $this->cityId = $params['city_id'];
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


}