<?php

include_once("employeeDao.php");

$errors = "";
if (!isset($_POST['employee'])){
    $errors = "Employee Not Available";
}else{
    $employee = json_decode($_POST['employee']);

    if (!(isset($employee->name) && isset($employee->dob) && isset($employee->nic)&& isset($employee->mobile)&& isset($employee->address)&& isset($employee->email)&& isset($employee->gender)&& isset($employee->employeeStatus)&& isset($employee->designation))){
        $errors = "Employee data are missing";
    }else{
        if (!preg_match("/^[A-Z][a-z]{2,}$/",$employee->name)) $errors = "Name is invalid\n";
        if (!preg_match("/^([0-9]{9}[x|X|v|V]|[0-9]{12})$/",$employee->nic)) $errors = "Nic is invalid\n";
        if (!preg_match("/^(?:7|0|(?:\+94))[0-9]{9}$/",$employee->mobile)) $errors = "Mobile is invalid\n";
        if (!preg_match("/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/", $employee->email)) $errors = "Email is invalid\n";
        if ($employee->gender == null) $errors = "Gender is not selected\n";
        if ($employee->employeeStatus == null) $errors = "EmployeeStatus is not selected\n";
        if ($employee->designation == null) $errors = "Designation is not selected\n";
    }
}

    if($errors != ""){
        echo($errors);
    }else{
        $emp = employeeDao::getByNic($employee->nic);
        if ($emp != null && $emp->id != $employee->id){
            echo("This NIC is already exists");
        }else{
           $result =  EmployeeDao::updateEmployee($employee);
           if ($result !=1){
               echo("Database Error");
           }
        }
    }


//    $employees = array();
//
//    $hasName = !empty($_GET['name']);
//    $hasGender = !empty($_GET['gender']);
//
//    if ($hasName){
//        $name = $_GET['name'];
//    }
//
//    if ($hasGender){
//        $gender = $_GET['gender'];
//    }
//
//    if (!$hasName && !$hasGender) $employees = EmployeeDao::getAll();
//
//    if ($hasName && !$hasGender)$employees = EmployeeDao::getBYName($name);
//
//    if (!$hasName && $hasGender)$employees = EmployeeDao::getByGender($gender);
//
//    if ($hasName && $hasGender)$employees = EmployeeDao::getByNameAndGender($name,$gender);
//
//    echo(json_encode($employees));



?>
