<?php
require $_SERVER['DOCUMENT_ROOT'].'/core/database/connection.php';

$login_email = $_POST['email'];
$login_password = $_POST['password'];
$admin = (bool)false;

        if(checkUser()){
            if($admin){
                // if the user is the admin, redirect to admin view
              header('Location: /public/views/hotels.view.admin.php');
            }
            else
                //bring user to see available hotels
                header('Location: /public/views/hotels.view.php');

        }
        else{
            //bring user back to login page
            header('Location: /public/views/login.view.php?error');
        }
    

    //check if email and password entered exist and match
     function checkUser(){
         global $admin;
           $pdo = Connection::connect();
            $sql = "SELECT user_email, user_password FROM user WHERE user_email = '".$_POST['email']."';";
            $users_result = $pdo->prepare($sql);
            $users_result->execute();
         
         // if no output from SQL statement, reject entry
        if($users_result->rowCount()<1)
            return false;
         
         else{
            while($users = $users_result->fetch(PDO::FETCH_ASSOC)){
             
                if(($users['user_password'] == $_POST['password'])){
                    //password matches with the only unencrypted password
                    $admin = true;
                    return true;
                    
                    exit;
                }
                 elseif((password_verify($_POST['password'],$users['user_password'])) && ($_POST['email'] == $users['user_email'])){
                 //password and email match, accept entry
                    $admin = false;
                    return true;
                
                    exit;
                    }
                else{
                // password or email do not match, reject entry
                    return false;
                    exit;
                    }
            }
            
         }
         return true;
    }

?>