<?php
    require("connection.php");
    session_start();
    $connection = Connector::getConnection();

    if(isset($_POST['ok'])){
            $name = strip_tags($_POST['name']);
            $vorname = strip_tags($_POST['vorname']);
            $username = strip_tags($_POST['username']);
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);
            $password_confirm = strip_tags($_POST['password_confirm']);
            
            $_SESSION['name'] = $name;
            $_SESSION['vorname'] = $vorname;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
           


                
            if($password == $password_confirm){
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
                $requete = $connection->prepare("INSERT INTO users (name, vorname, benutzername, email, password, passwort_bestaetigen)  VALUES (:name, :vorname, :benutzername, :email, :password, :passwort_bestaetigen)");
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
                $_SESSION['error'] = "Passwörter stimmen nicht überein";
                header("Location: registrierung.php");
        
            }
        // }
}
    
?>;