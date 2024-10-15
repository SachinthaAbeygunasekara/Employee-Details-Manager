<?php

class CommonDao{

  public static function getConnection(){

    $dbconn = new mysqli("localhost", "root", "1234","harvest");

    if (!$dbconn) {
      die("Connection failed: ");
    }

    return $dbconn;
  }

}

?>