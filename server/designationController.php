<?php

include_once("designationDao.php");

class DesignationController{
    public static function get(){
        $designations = designationDao::getAll();
        return json_encode($designations);

    }
}



?>
