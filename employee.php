<?php

class Employee
{
    public $id;
    public $name;
    public $dob;
    public $nic;
    public $mobile;
    public $address;
    public $email;
    public $gender;
    public $employeestatus;
    public $designation;

    public function __construct(){}

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDob()
    {
        return $this->dob;
    }

    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    public function getNic()
    {
        return $this->nic;
    }

    public function setNic($nic)
    {
        $this->nic = $nic;
    }

    public function getMobile()
    {
        return $this->mobile;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getEmployeestatus()
    {
        return $this->employeestatus;
    }

    public function setEmployeestatus($employeestatus)
    {
        $this->employeestatus = $employeestatus;
    }

    public function getDesignation()
    {
        return $this->designation;
    }

    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }


}