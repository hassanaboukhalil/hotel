<?php
    ///////////updating passwords
    if(isset($_POST["pass"]) && isset($_POST["email"])){
        include("./cred.php");
        $email = trim(strip_tags(htmlspecialchars($_POST["email"])));
        $pass = $_POST["pass"];
        $sql = "SELECT email FROM user WHERE email = '$email'";
        $result = mysqli_query($db_connect,$sql) or die("can't receive data from database");
        $row = mysqli_fetch_assoc($result);
        if($row and $row["email"] == $email){
            $sql = "UPDATE user SET password='$pass' WHERE email = '$email'";
            // $result = mysqli_query($db_connect,$sql) or die("can't receive data from database");
            if (mysqli_query($db_connect, $sql)) {
                echo "the password was updated";
            }
            else{
                echo "something went wrong";
            }
        }
        else{
            echo "Email is not found";
        }
        mysqli_close($db_connect);
    }







?>