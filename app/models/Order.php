<?php

class Order extends Model
{
    protected static $tableName = 'orders';
    protected static $keyColumn = 'order_id';
    protected $user_id;
    protected $delivery_address;
    protected $status;
    protected $created_at;

    public function __set($name, $value)
    {
        $name = 'set' . ucfirst($name);
        if (method_exists($this, $name)) {
            return $this->$name($value);
        }
    }

public function __get($name)
    {
        $name = 'get' . ucfirst($name);
        if (method_exists($this, $name)) {
            return $this->$name();
        }
    }

    public function setUser_id($value)
    {
        $this->user_id = $value;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setDelivery_address($value)
    {
        $this->delivery_address = $value;
    }

    public function getDelivery_address()
    {
        return $this->delivery_address;
    }

    public function setStatus($value)
    {
        $this->status = $value;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setCreated_at($value)
    {
        $this->created_at = $value;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }
}
