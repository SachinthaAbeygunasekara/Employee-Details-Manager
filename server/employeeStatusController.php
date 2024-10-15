<?php

include_once("employeeStatusDao.php");

class EmployeeStatusController{
    public static function get(){
        $employeeStatuses = employeeStatusDao::getAll();
        return json_encode($employeeStatuses);


    }
}

?>
