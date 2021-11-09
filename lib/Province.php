<?php

class Province
{
    protected $name = "";
    protected $id = 0;

    public function __construct(array $params) {
        if(!empty($params)){
            $this->name = $params['name'];
            $this->id = $params['id'];
        }
    }

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
}