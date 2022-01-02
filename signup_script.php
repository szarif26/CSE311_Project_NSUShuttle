<?php
if(isset($_POST['SignUp'])){

    require 'databasehandler.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if(empty($id) || empty($name) || empty($phone) || empty($address) || empty($password) || empty($confirmpassword)){

    header("Location: ../signUp.html");
    exit();
    }
    else if($password !== $confirmpassword){

    header("Location: ../signUp.html");
     exit();
    }

    else{

        $sql = "SELECT User_ID FROM user Where id=?";
        $statement = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($statement, $sql)){

            header("Location: ../signUp.html");
            exit();
        }
        else{
            mysqli_stmt_bind_param($statement, "i", $id);
            mysql_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            $resultCheck = mysqli_stmt_num_rows($statement);

            if($resultCheck > 0){
                header("Location: ../signUp.html");
            exit();
            }
            else{

                $sql = "INSERT INTO user(User_ID, Name, Phone, Address, Password) VALUES (?, ?, ?, ?, ?)";
                $statement = mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($statement, $sql)){

                    header("Location: ../signUp.html");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($statement, "issss", $id, $name, $phone, $address, $password);
                    mysql_stmt_execute($statement);
                    header("Location: ../signUp.html?signup=Success");
                        exit();

                }

            }
        }
        
    }
        mysqli_stmt_close($statement);
        mysqli_close($con);
}

else{

    header("Location: ../signUp.html");
    exit();
    
}
