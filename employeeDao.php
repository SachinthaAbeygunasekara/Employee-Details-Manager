<?php
 
include_once("db.php");
include_once("employee.php");
include_once("genderDao.php");
include_once("employeeStatusDao.php");
include_once("designationDao.php");

    class EmployeeDao{

        public static function setData($row){
            $employee = new Employee();
            $employee->setId($row['id']);
            $employee->setName($row['name']);
            $employee->setDob($row['dob']);
            $employee->setNic($row['nic']);
            $employee->setMobile($row['mobile']);
            $employee->setAddress($row['address']);
            $employee->setEmail($row['email']);
            $gender = GenderDao::getById($row['gender_id']);
            $employee->setGender($gender);
            $employeestatus = EmployeeStatusDao::getById($row['employeestatus_id']);
            $employee->setEmployeestatus($employeestatus);
            $designation = DesignationDao::getById($row['designation_id']);
            $employee->setDesignation($designation);

            return $employee;
        }

        static function getById($id){

            $employee = null;
            $sql = "SELECT * FROM employee WHERE id =".$id;
            $result = CommonDao::getResult($sql);

            if ($row = $result->fetch_assoc()){
                $employee = EmployeeDao::setData($row );
            }
            return $employee;

        }

        static function getAll(){
            $employees = array();
            $sql = "SELECT * FROM employee";
            $result = CommonDao::getResult($sql);
            while($rows = $result->fetch_assoc()){
                $employee = EmployeeDao::setData($rows);
                array_push($employees,$employee);
            }
            return $employees;

        }

        public static function getBYName($name)
        {
            $employees = array();
            $sql = "SELECT * FROM employee WHERE name LIKE '$name%'";
            $result = CommonDao::getResult($sql);
            while($rows = $result->fetch_assoc()){
                $employee = EmployeeDao::setData($rows);
                array_push($employees,$employee);
            }
            return $employees;
        }

        public static function getByGender($gender)
        {
            $employees = array();
            $sql = "SELECT * FROM employee WHERE gender_id=$gender";
            $result = CommonDao::getResult($sql);
            while($rows = $result->fetch_assoc()){
                $employee = EmployeeDao::setData($rows);
                array_push($employees,$employee);
            }

            return $employees;
        }

        public static function getByNameAndGender($name, $gender)
        {
            $employees = array();
            $sql = "SELECT * FROM employee WHERE name LIKE '$name%' AND gender_id=$gender";
            $result = CommonDao::getResult($sql);
            while($rows = $result->fetch_assoc()){
                $employee = EmployeeDao::setData($rows);
                array_push($employees,$employee);
            }

            return $employees;
        }

        static function getByNic($nic){

            $employee = null;
            $sql = "SELECT * FROM employee WHERE nic ='$nic'";
            $result = CommonDao::getResult($sql);
            if ($row = $result->fetch_assoc()){
                $employee =EmployeeDao::setData($row);;
            }
            return $employee;
        }

        static function insertEmployee($employee){
            $sql = "INSERT INTO employee (name, dob, nic, mobile, address, email, gender_id, employeestatus_id, designation_id) VALUES ('" . $employee->name . "','" . $employee->dob . "','" . $employee->nic . "','" . $employee->mobile . "','" . $employee->address . "','" . $employee->email . "'," . $employee->gender->id . "," . $employee->employeeStatus->id . "," . $employee->designation->id . ")";
            return CommonDao::getResult($sql);

        }

        static function deleteEmployee($oldEmployee){

            if (EmployeeDao::getById($oldEmployee->id) == null){
                return "Employee Not Found";
            }else{
                $sql = "DELETE FROM employee WHERE id=".$oldEmployee->id;
                return CommonDao::getResult($sql);
            }
        }

        public static function updateEmployee($employee){
            $sql = "UPDATE employee SET name = '" . $employee->name . "', dob = '" . $employee->dob . "', nic = '" . $employee->nic . "', mobile = '" . $employee->mobile . "', address = '" . $employee->address . "', email = '" . $employee->email . "', gender_id = " . $employee->gender->id . ", employeestatus_id = " . $employee->employeeStatus->id . ", designation_id = " . $employee->designation->id . " WHERE id = " . $employee->id;
            return CommonDao::getResult($sql);
        }
    }
?>