<?php   
    require_once("JavascriptUtils.php");
    $servername = "localhost";
    $username = 'root';
    $password = '';
    $con = ""; 

    try {
        $con = new PDO("mysql:host=$servername;dbname=userdb", $username, $password); //mysql  server  host        
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//PDO::ERRMODE_  EXCEPTION
    } catch (PDOException $e) {
        $message = "Verbindung festgeschlagen: ". $e->getMessage();
        JavascriptUtils::alert($message);
    } 

?>;