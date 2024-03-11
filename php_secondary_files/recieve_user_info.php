<?php 
session_start();
if(isset($_SESSION["email"])){
    $email = trim(strip_tags(htmlspecialchars($_SESSION["email"])));
    include("../cred.php");
    $sql = "SELECT fname, phone, email FROM user WHERE email = '$email'";
    $result = mysqli_query($db_connect,$sql) or die("can't receive data from database");
    $row = mysqli_fetch_assoc($result);
    if($row and $row["email"] == $email){
        $data = ["name" => $row["fname"],"email" => $row["email"], "phone" => $row["phone"]];
        //
        /// transform the array into json
        echo json_encode($data);
    }
    else{
        die("the data does not recieved, maybe the email was incorrect");
    }
}

?>