<?php

    if(isset($_POST['User_Login'])){
        
        require 'databasehandler.php';

        $id=$_POST['id'];
        $password=$_POST['password'];

        if(empty($id) || empty($password)){

            header("Location: ../login.html");
            exit();
            }
        else{

            $sql="SELECT * FROM user WHERE User_ID =?;";
            $stmt = mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt, $sql)){

                header("Location: ../login.html");
                exit();
            }
            else{

                mysqli_stmt_bind_param($stmt,"i", $id);
                mysqli_stmt_execute($stmt);
                $results = mysqli_get_results($stmt);
                if($row =mysqli_fetch_assoc($results)){
                    $passwordCheck = password_verify($password, $row['Password']);
                    if($passwordCheck == false){
                        
                        header("Location: ../login.html");
                        exit();
                    }
                    else if($passwordCheck== true){

                        session_start();
                        $_SESSION[userID] = $row['User_ID'];
                        $_SESSION[Name] = $row['Name'];
                        header("Location: ../user_account.html");
                        exit();
                    }
                    else{
                        header("Location: ../login.html");
                        exit();
                    }
                }
                else{
                    header("Location: ../login.html");
                    exit();
                }
            }
        }

    }
    else{
        header("Location: ../userlogin.html");
        exit();
    }