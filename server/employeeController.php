<?php

include_once("employeeDao.php");

class EmployeeController{
    public static function get(){
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

        return json_encode($employees);
    }

    public static function post($employee){

        $errors = "";

        if ($employee == null){
            $errors = "Employee Not Available";
        }else{

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
            if (employeeDao::getByNic($employee->nic) != null){
                echo("This NIC is already exists");
            }else{
                $result =  EmployeeDao::insertEmployee($employee);
                if ($result !=1){
                    echo("Database Error");
                }
            }
        }
    }

        public static function put($id,$employee){
            $errors = "";
            if ($employee == null){
                $errors = "Employee Not Available";
            }else{

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

                $empById = employeeDao::getById($id);
                if (!$empById){
                    echo "Employee Not Found in Database";
                }else{

                    $emp = employeeDao::getByNic($employee->nic);
                    if ($emp != null && $emp->id != $id){
                        echo("This NIC is already exists");
                    }
                    else{
                        $employee->id = $id;
                        $result =  EmployeeDao::updateEmployee($employee);
                        if ($result !=1){
                            echo("Database Error");
                        }
                    }

                }

            }

        }

                public static function delete($id){
                    $empById = employeeDao::getById($id);
                    if (!$empById){
                        echo "Employee Not Available";
                    }else{
                        $result = EmployeeDao::deleteEmployee($empById);

                        if ($result !=1){
                            echo("Database Error");
                        }

                    }
                }
}

?>
