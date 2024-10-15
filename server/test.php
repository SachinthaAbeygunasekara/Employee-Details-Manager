<?php

//include("genderDao.php");
include("employeeDao.php");
//
//$gender = GenderDao::getById(1);
//echo(json_encode($gender));
//
//// echo("[{'id':'".$gender->getId()."', 'name': '".$gender->getName()."'}]");
//
//echo("</br></br>");
//
//$genders = GenderDao::getAll();
//
//echo(json_encode($genders));

$employee = EmployeeDao::getById(1);
echo(json_encode($employee));

echo("</br></br>");

$employees = EmployeeDao::getAll();
echo(json_encode($employees));



?>