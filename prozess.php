<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $database = new PDO("mysql:host=$servername;dbname=userdb", $username, $password); //mysql  server  host        
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//PDO::ERRMODE_  EXCEPTION
    } catch (PDOException $e) {
        echo "Verbindung festgeschlagen: ". $e->getMessage();
    } // end try


    if(isset($_POST['ok'])){
        //var_dump($_POST); // var_dump() gibt alle Variablen und ihre Werte aus
        $name = $_POST['name'];
        $vorname = $_POST['vorname'];
        $benutzername = $_POST['benutzername'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_bestaetigen = $_POST['password_bestaetigen'];  
        
        if($password == $password_bestaetigen){
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
            $requete = $database->prepare("INSERT INTO users (name, vorname, benutzername, email, password, password_bestaetigen)  VALUES (:name, :vorname, :benutzername, :email, :password, :password_bestaetigen)");
            $requete->execute([
                    array(
                        'name' => $name,
                        'vorname' => $vorname,
                        'benutzername' => $benutzername,
                        'email' => $email,
                        'password' => $hashedPassword
                        'password_bestaetigen' => $hashedPassword
                        )
                    ]);

                echo "Registrierung erfolgreich";
        } else {
            echo "Passwörter stimmen nicht überein";
    
        }
    }
    
?>;