<?php
    

    if(isset($_POST['submit'])){
        include ('connection.php');
        $fullname = $_POST['fname'];
        $email = $_POST['email'];
        $phone = $_POST['tel'];
        $message = $_POST['message'];

        // if($database){
        //     echo "Connection established";
        // }
        

        $query = "INSERT INTO message(fullname, email, tel, messagebody)VALUES('$fullname', '$email', '$phone', '$message' )";
        
        $execut = mysqli_query($database, $query);
        if($execut){
            echo "<h1>Message sent successfully</h1>";
            // echo $fullname . 
        }else{
            echo "<h1>Error while sending message</h1>";
        }
        
    }else{
        echo "NOT POST METHOD";
    }
?>