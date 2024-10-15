<?php

include_once "employeeController.php";
include_once "genderController.php";
include_once "designationController.php";
include_once "employeeStatusController.php";

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$resource = explode('?',(explode('/',$request)[5]))[0];

$output = null;

switch ($resource) {
    case "employees":
        switch ($method) {
            case "GET":
                $output = EmployeeController::get();
                break;
            case "POST":
                $output = EmployeeController::post(getData());
                break;
            case "PUT":
                $output = EmployeeController::put(getURLId($request),getData());
                break;
            case "DELETE":
                $output = EmployeeController::delete(getURLId($request));
                break;
        }
        break;

    case "genders":
        switch ($method) {
            case "GET":
                $output = GenderController::get();
        }
        break;

    case "designations":
        switch ($method) {
            case "GET":
                $output = DesignationController::get();
                break;
        }
        break;

    case "employeeStatuses":
        switch ($method) {
            case "GET":
                $output = EmployeeStatusController::get();
                break;
        }
        break;
}
echo($output);

     function getURLId($request){
         if (count(explode('/',$request))>6){
             return explode('/',$request)[6];
         }else{
             die("ID Not Found!");
         }


    }

function getData(){
    $jsonFile = fopen('php://input','r');
    $jsonString = fread($jsonFile,1024);
    return json_decode($jsonString);

}
?>