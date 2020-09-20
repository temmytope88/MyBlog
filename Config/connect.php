<?php
  $servername = "us-cdbr-east-02.cleardb.com";
  $username = "ba7326a1dc2e5f";
  $password = "0b3fa734";
  $dbname = "heroku_78117a12850a27f";

  try {
    $conn = new PDO ("mysql:host=$servername;dbname=$dbname" , $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){
    echo "Connection failed: ".$e->getMessage();
  }
  