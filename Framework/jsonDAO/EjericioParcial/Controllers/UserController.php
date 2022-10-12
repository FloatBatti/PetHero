<?php 

namespace Controller;


class UserController{


    public function Login($username, $password){

        
        if($username == "a" && $password == "1"){
        
            session_start();
        
            $loggedUser = $username;
        
            $_SESSION["loggedUser"] = $loggedUser;
          
            header("location:../Views/add-form.php");
        }
        else{
                
            echo "<script> if(confirm('Verifique que el nombre de usuario sea correcto'));";
            echo "window.location = '../Views/index.php';
            </script>";
        
        }
        
        

    }


}



?>