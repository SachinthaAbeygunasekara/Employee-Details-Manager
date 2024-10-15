<?php

include_once("employeeStatusDao.php");

$employeeStatuses = employeeStatusDao::getAll();
echo(json_encode($employeeStatuses));

?>
