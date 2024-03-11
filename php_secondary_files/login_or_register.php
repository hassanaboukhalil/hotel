<?php 

if(session_start()){
    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["phone"])){
        //
        ///////////////// create variables
        $name = trim(strip_tags(htmlspecialchars($_POST["name"])));
        $email = trim(strip_tags(htmlspecialchars($_POST["email"])));
        $ps = $_POST["pass"];
        $phone = $_POST["phone"];
        $with_google = "false";
        // echo $pass;
        //////////////////////////////////
        //
        //
        //
        ////////////////////////////////// create sql and insert the data to the database and return a response of what happened
        include("../cred.php");
        $sql = "INSERT INTO user (`fname`, `phone`,`email`, `with_google`, `password`) VALUES ('$name','$phone','$email', '$with_google','$ps')";
        if(mysqli_query($db_connect,$sql)){
            // $data = ["msg" => "true"];
            $_SESSION["email"] = $email;
            header("Location: ../user_index.php");
        }
        else{
            // $data = ["msg" => "false"];
            die("Something went wrong try again later");

        }
        /// transform the array into json
        // echo json_encode($data);
        ////////////////////////////////////////////
    }
    else{
        // $data = ["msg" => "You does not enter the full data"];
        // echo json_encode($data);
        die("You does not enter the full data");
    }
}

?>