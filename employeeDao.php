<?php
 
include_once("db.php");
include_once("employee.php");
include_once("genderDao.php");
include_once("employeeStatusDao.php");
include_once("designationDao.php");

    class EmployeeDao{

        static function getById($id){

            $employee = new Employee();

            $sql = "SELECT * FROM employee WHERE id =".$id;
            $dbconn = CommonDao::getConnection();
            $result = $dbconn->query($sql);

            $row = $result->fetch_assoc();

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

        static function getAll(){

            $employees = array();

            $sql = "SELECT * FROM employee";
            $dbconn = CommonDao::getConnection();
            $result = $dbconn->query($sql);
            while($rows = $result->fetch_assoc()){
                
                $employee = new Employee();
                
                $employee->setId($rows['id']);
                $employee->setName($rows['name']);
                $employee->setDob($rows['dob']);
                $employee->setNic($rows['nic']);
                $employee->setMobile($rows['mobile']);
                $employee->setAddress($rows['address']);
                $employee->setEmail($rows['email']);

                $gender = GenderDao::getById($rows['gender_id']);
                $employee->setGender($gender);

                $employeestatus = EmployeeStatusDao::getById($rows['employeestatus_id']);
                $employee->setEmployeestatus($employeestatus);

                $designation = DesignationDao::getById($rows['designation_id']);
                $employee->setDesignation($designation);

                array_push($employees,$employee);
            }

            return $employees;

        }

        public static function getBYName($name)
        {

            $employees = array();

            $sql = "SELECT * FROM employee WHERE name LIKE '$name%'";
            $dbconn = CommonDao::getConnection();
            $result = $dbconn->query($sql);
            while($rows = $result->fetch_assoc()){

                $employee = new Employee();

                $employee->setId($rows['id']);
                $employee->setName($rows['name']);
                $employee->setDob($rows['dob']);
                $employee->setNic($rows['nic']);
                $employee->setMobile($rows['mobile']);
                $employee->setAddress($rows['address']);
                $employee->setEmail($rows['email']);

                $gender = GenderDao::getById($rows['gender_id']);
                $employee->setGender($gender);

                $employeestatus = EmployeeStatusDao::getById($rows['employeestatus_id']);
                $employee->setEmployeestatus($employeestatus);

                $designation = DesignationDao::getById($rows['designation_id']);
                $employee->setDesignation($designation);

                array_push($employees,$employee);
            }

            return $employees;
        }

        public static function getByGender($gender)
        {

            $employees = array();

            $sql = "SELECT * FROM employee WHERE gender_id=$gender";
            $dbconn = CommonDao::getConnection();
            $result = $dbconn->query($sql);
            while($rows = $result->fetch_assoc()){

                $employee = new Employee();

                $employee->setId($rows['id']);
                $employee->setName($rows['name']);
                $employee->setDob($rows['dob']);
                $employee->setNic($rows['nic']);
                $employee->setMobile($rows['mobile']);
                $employee->setAddress($rows['address']);
                $employee->setEmail($rows['email']);

                $gender = GenderDao::getById($rows['gender_id']);
                $employee->setGender($gender);

                $employeestatus = EmployeeStatusDao::getById($rows['employeestatus_id']);
                $employee->setEmployeestatus($employeestatus);

                $designation = DesignationDao::getById($rows['designation_id']);
                $employee->setDesignation($designation);

                array_push($employees,$employee);
            }

            return $employees;
        }

        public static function getByNameAndGender($name, $gender)
        {

            $employees = array();

            $sql = "SELECT * FROM employee WHERE name LIKE '$name%' AND gender_id=$gender";
            $dbconn = CommonDao::getConnection();
            $result = $dbconn->query($sql);
            while($rows = $result->fetch_assoc()){

                $employee = new Employee();

                $employee->setId($rows['id']);
                $employee->setName($rows['name']);
                $employee->setDob($rows['dob']);
                $employee->setNic($rows['nic']);
                $employee->setMobile($rows['mobile']);
                $employee->setAddress($rows['address']);
                $employee->setEmail($rows['email']);

                $gender = GenderDao::getById($rows['gender_id']);
                $employee->setGender($gender);

                $employeestatus = EmployeeStatusDao::getById($rows['employeestatus_id']);
                $employee->setEmployeestatus($employeestatus);

                $designation = DesignationDao::getById($rows['designation_id']);
                $employee->setDesignation($designation);

                array_push($employees,$employee);
            }

            return $employees;
        }
    }
?>