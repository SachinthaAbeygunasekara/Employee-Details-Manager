<?php

include_once("employeeDao.php");

$errors = "";
if (!isset($_POST['employee'])){
    $errors = "Employee Not Available";
}else{
    $employee = json_decode($_POST['employee']);
    $result = EmployeeDao::deleteEmployee($employee);

    if ($result !=1){
      echo("Database Error");
  }

}
//
//    if($errors != ""){
//        echo($errors);
//    }else{
//        if (employeeDao::getByNic($employee->nic) != null){
//            echo("This NIC is already exists");
//        }else{
//           $result =  EmployeeDao::insertEmployee($employee);
//           if ($result !=1){
//               echo("Database Error");
//           }
//        }
//    }

?>
