<?php

include_once("genderDao.php");

class GenderController{
    public static function get(){
        $genders = GenderDao::getAll();
        return json_encode($genders);

    }
}


?>
