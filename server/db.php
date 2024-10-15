<?php

class CommonDao{

  public static function getResult($sql){

    $dbconn = new mysqli("localhost", "root", "1234","harvest");

    if (!$dbconn) {
      die("Connection failed: ");
    }

      return $dbconn->query($sql);

  }

}

?>