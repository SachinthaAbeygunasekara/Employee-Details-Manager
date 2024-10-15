<?php

include_once("db.php");
include_once("gender.php");

    class GenderDao{

        public static function setData($row){
            $gender = new Gender();
            $gender->setId($row['id']);
            $gender->setName($row['name']);
            return $gender;
        }

        static function getById($id){
            $gender = null;
            $sql = "SELECT * FROM gender WHERE id =".$id;
            $result = CommonDao::getResult($sql);
            if ($row = $result->fetch_assoc()){
                $gender = GenderDao::setData($row);
            }
            return $gender;
        }

        static function getAll(){
            $genders = array();
            $sql = "SELECT * FROM gender";
            $result = CommonDao::getResult($sql);
            while($rows = $result->fetch_assoc()){
                $gender = GenderDao::setData($rows);
                array_push($genders,$gender);
            }
            return $genders;
        }
    }
?>