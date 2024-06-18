<?php   
    require_once("JavascriptUtils.php");

    class Connector{
        private static $servername = "localhost";
        private static $username = 'root';
        private static $password = '';
        public static function getConnection(){
            try {
                $con = new PDO("mysql:host=".self::$servername.";dbname=userdb", self::$username, self::$password); //mysql  server  host        
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//PDO::ERRMODE_  EXCEPTION
                return $con;
            } catch (PDOException $e) {
                $message = "Verbindung festgeschlagen: ". $e->getMessage();
                unset($_POST);
                $_POST = array();
                self::alertAndRedirect($message, "index.php");
                
            } 
        }

        private static function alertAndRedirect($message, $url) {
            JavascriptUtils::alert($message);
            echo "<script>
                    window.location.href = '$url';
                  </script>";
            exit(); // Ensure script stops execution here
        }
    }
    

?>;