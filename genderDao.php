<?php

include_once("db.php");
include_once("gender.php");

    class GenderDao{

        static function getById($id){

            $gender = new Gender();

            $sql = "SELECT * FROM gender WHERE id =".$id;
            $dbconn = CommonDao::getConnection();
            $result = $dbconn->query($sql);
            $row = $result->fetch_assoc();

            $gender->setId($row['id']);
            $gender->setName($row['name']);

            return $gender;


        }

        static function getAll(){

            $genders = array();

            $sql = "SELECT * FROM gender";
            $dbconn = CommonDao::getConnection();
            $result = $dbconn->query($sql);
            while($rows = $result->fetch_assoc()){
                
                $gender = new Gender();
                $gender->setId($rows['id']);
                $gender->setName($rows['name']);

                array_push($genders,$gender);
            }

            return $genders;

        }
    }
?>