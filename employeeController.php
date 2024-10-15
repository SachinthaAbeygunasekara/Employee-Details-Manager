<?php

include_once("employeeDao.php");

    $employees = array();

    $hasName = !empty($_GET['name']);
    $hasGender = !empty($_GET['gender']);

    if ($hasName){
        $name = $_GET['name'];
    }

    if ($hasGender){
        $gender = $_GET['gender'];
    }

    if (!$hasName && !$hasGender) $employees = EmployeeDao::getAll();

    if ($hasName && !$hasGender)$employees = EmployeeDao::getBYName($name);

    if (!$hasName && $hasGender)$employees = EmployeeDao::getByGender($gender);

    if ($hasName && $hasGender)$employees = EmployeeDao::getByNameAndGender($name,$gender);

    echo(json_encode($employees));

?>
