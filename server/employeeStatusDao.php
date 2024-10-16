<?php

include_once("db.php");
include_once("employeeStatus.php");

    class EmployeeStatusDao{

        static function getById($id){

            $employeestatus = new EmployeeStatus();

            $sql = "SELECT * FROM employeestatus WHERE id =".$id;
            $result = CommonDao::getResult($sql);
            $row = $result->fetch_assoc();

            $employeestatus->setId($row['id']);
            $employeestatus->setName($row['name']);

            return $employeestatus;


        }

        static function getAll(){

            $employeestatuses = array();

            $sql = "SELECT * FROM employeestatus";
            $result = CommonDao::getResult($sql);
            while($rows = $result->fetch_assoc()){
                
                $employeestatus = new EmployeeStatus();
                $employeestatus->setId($rows['id']);
                $employeestatus->setName($rows['name']);

                array_push($employeestatuses,$employeestatus);
            }

            return $employeestatuses;

        }
    }
?>