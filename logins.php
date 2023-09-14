<?php
    session_start();

    $_SESSION["user"]="";
    $_SESSION["usertype"]="";
    
    // Set the new timezone
    date_default_timezone_set('Africa/Kampala');
    $date = date('Y-m-d');

    $_SESSION["date"]=$date;
    

    //import database
    

    if($_POST){

        include("connection.php");

        $email=$_POST['useremail'];
        $password=$_POST['userpassword'];
        
        $error='<label for="promter" class="form-label"></label>';
        
        $result= $database->query("select * from webuser where email='$email'");


        if($result->num_rows==1){
            header('location: system/dashboard.html');

            $utype=$result->fetch_assoc()['usertype'];
            if ($utype=='u'){
                $checker = $database->query("select * from patient where pemail='$email' and ppassword='$password'");
                if ($checker->num_rows==1){


                    //   User dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='u';
                    
                    header('location: system/dashboard.html');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }elseif($utype=='a'){
                $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
                if ($checker->num_rows==1){


                    //   Admin dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='a';
                    
                    header('location: system/dashboard.html');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }


            }
            
        }else{
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email.</label>';
        }
        
    }else{
        $error='<label for="promter" class="form-label">&nbsp;</label>';
    }

    ?>