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
        // Prüfen ob alle Felder ausgefüllt wurden 
        if(empty($_POST['name']) || empty($_POST['vorname']) || empty($_POST['username']) || empty ($_POST['password']) || empty ($_POST['password_confirm'])){
            echo "Bitte füllen Sie alle Felder aus";
        } else {
            $name = $_POST['name'];
            $vorname = $_POST['vorname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm']; //  Password confirmation
                
            if($password == $password_confirm){
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
                $requete = $database->prepare("INSERT INTO users (name, vorname, benutzername, email, password, passwort_bestaetigen)  VALUES (:name, :vorname, :benutzername, :email, :password, :passwort_bestaetigen)");
                $requete->execute([                    
                            'name' => $name,
                            'vorname' => $vorname,
                            'benutzername' => $username,
                            'email' => $email,
                            'password' => $hashedPassword,
                            'passwort_bestaetigen' => $hashedPassword
                            
                        ]);

                    echo "Registrierung erfolgreich";
                    header("Location: bestaetigung.php");
                    exit();
                    
                    
            } else {
                echo "Passwörter stimmen nicht überein";
        
            }
        }
}
    
?>;