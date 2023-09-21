<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="system/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="system/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<?php
    session_start();

    $_SESSION["user"]="";
    $_SESSION["usertype"]="";
    // $_SESSION['uname'] = "";
    
    // Set the new timezone
    date_default_timezone_set('Africa/Kampala');
    $date = date('Y-m-d');

    $_SESSION["date"]=$date;
    

    //import database
    include("connection.php");
    

    if($_POST){
        $email=$_POST['email'];
        $password=md5($_POST['pass']);
        
        $error='<label for="promter" class="form-label"></label>';
        
        $result= $database->query("select * from webuser where email='$email'");
        // $resultuser = $database->query("select * from user where email='$email'");
        
        if($result->num_rows==1){
            $utype=$result->fetch_assoc()['usertype'];
            if ($utype=='u'){
                $checker = $database->query("select * from user where uemail='$email' and upassword='$password'");
                
                if ($checker->num_rows==1){

                    //   User dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='u';
                    // $_SESSION['uname'] = $username;
                    
                    header('location: system/user/dashboard.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }elseif($utype=='a'){
                $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
                if ($checker->num_rows==1){


                    //   Admin dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='a';
                    
                    header('location: system/admin/dashboard.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                    echo "Wrong credentials";
                }


            }
            
        }else{
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant find any account for this email.</label>';
            // echo "success";
        }
        
    }else{
        $error='<label for="promter" class="form-label">&nbsp;</label>';
        // echo "Post error";
    }

    ?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Welcome back !</h1>
                                        <p class="mb-4">Login here</p>
                                    </div>
                                    <form action="" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="pass"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Password...">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login" />
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="add_account.php">Don't have an account ? Create!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>