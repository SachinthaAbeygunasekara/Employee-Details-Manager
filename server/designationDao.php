<?php

include_once("db.php");
include_once("designation.php");

    class DesignationDao{

        static function getById($id){

            $designation = new Designation();

            $sql = "SELECT * FROM designation WHERE id =".$id;
            $result = CommonDao::getResult($sql);
            $row = $result->fetch_assoc();

            $designation->setId($row['id']);
            $designation->setName($row['name']);

            return $designation;


        }

        static function getAll(){

            $designations = array();

            $sql = "SELECT * FROM designation";
            $result = CommonDao::getResult($sql);
            while($rows = $result->fetch_assoc()){
                
                $designation = new Designation();
                $designation->setId($rows['id']);
                $designation->setName($rows['name']);

                array_push($designations,$designation);
            }

            return $designations;

        }
    }
?>