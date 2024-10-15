<?php

include_once("genderDao.php");

$genders = GenderDao::getAll();
echo(json_encode($genders));

?>
