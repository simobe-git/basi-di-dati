<?php
session_start();
require_once"connessione.php";

// controlla tasto premuto e metodo form è post
if(isset($_POST['registerBtn']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

    $email = $_POST['email'];
    $nome = $_POST['username'];
    $password = $_POST['password'];

    //controlla che tutti i campi non siano vuoti
    if(!empty($email) || !empty($username) || !empty($password)){

        //verifica che email inserita non sia già collegata ad un altro account
        $result = mysqli_query($connessione,"SELECT * FROM utenti WHERE email = '$email'");

        if(mysqli_num_rows($result) == 0){
            
            //controlla che il formato dell email sia del tipo "nomemail@dominio"
            //FILTER_VALIDATE_EMAIL è il fitro usato per le email
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                $sql = "INSERT INTO utenti(email,nome,password) VALUES ('$email','$nome','$password')";

                //verifica se aggiunta andata bene
                if(mysqli_query($connessione,$sql)){
                    header("Location: http://localhost/progetto-basi/basi-di-dati/login.php");
                    exit();
                }else{
                    echo "Errore".$sql.mysqli_error($connessione);
                }

            }else{
                echo"Formato email usato non valido";
            }
        }else{
            echo"Email collegata ad un altro account";
        }
    }else{
        echo"Campo vuoto da compilare";
    }   
}else{
    echo"Errore";
}

?>