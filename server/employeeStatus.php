<?php

    class EmployeeStatus{
        public $id;
        public $name;

        function __construct() {}

        function setId($id){
            $this->id= $id;
        }

        function getId(){
            return $this->id;
        }

        function setName($name){
            $this->name= $name;
        }

        function getName(){
            return $this->name;
        }
    }
 ?>