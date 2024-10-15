<?php

include_once("designationDao.php");

$designations = designationDao::getAll();
echo(json_encode($designations));

?>
