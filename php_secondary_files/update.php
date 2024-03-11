<?php
//
session_start();

if (isset($_POST["name"]) || isset($_POST["email"]) || isset($_POST["pass"]) || isset($_POST["phone"])) {
    include("../cred.php");
    try {
        if (isset($_POST["name"])) {
            $name = trim(strip_tags(htmlspecialchars($_POST["name"])));
            $email = $_SESSION["email"];
            //
            $sql1 = "UPDATE user SET fname = '$name' WHERE email = '$email'";
            $result1 = mysqli_query($db_connect, $sql1) or die("can't update your name");
            //
            $sql2 = "SELECT fname FROM user WHERE fname = '$name'";
            $result2 = mysqli_query($db_connect, $sql2) or die("can't update your name");
            $row2 = mysqli_fetch_assoc($result2);
            if ($row2 and $row2["fname"] == $name) {
                echo "your name updated successfully";
            } else {
                throw new Exception();
            }
        } elseif (isset($_POST["email"])) {
            $email_before = $_SESSION["email"];
            $email = trim(strip_tags(htmlspecialchars($_POST["email"])));
            //
            $sql1 = "UPDATE user SET email = '$email' WHERE email = '$email_before'";
            $result1 = mysqli_query($db_connect, $sql1) or die("can't update your email");
            //
            $sql2 = "SELECT email FROM user WHERE email = '$email'";
            $result2 = mysqli_query($db_connect, $sql2) or die("can't update your email");
            $row2 = mysqli_fetch_assoc($result2);
            if ($row2 and $row2["email"] == $email) {
                $_SESSION["email"] = $email;
                echo "your email updated successfully";
            } else {
                throw new Exception();
            }
        } elseif (isset($_POST["phone"])) {
            $phone = trim(strip_tags(htmlspecialchars($_POST["phone"])));
            $email = $_SESSION["email"];
            //
            $sql1 = "UPDATE user SET phone = '$phone' WHERE email = '$email'";
            $result1 = mysqli_query($db_connect, $sql1) or die("can't update your phone number");
            //
            $sql2 = "SELECT phone FROM user WHERE phone = '$phone'";
            $result2 = mysqli_query($db_connect, $sql2) or die("can't update your phone number");
            $row2 = mysqli_fetch_assoc($result2);
            if ($row2 and $row2["phone"] == $phone) {
                echo "your phone number updated successfully";
            } else {
                throw new Exception();
            }
        } elseif (isset($_POST["pass"]) && isset($_POST["curr_pass"])) {
            $curr_ps = $_POST["curr_pass"];
            $ps = $_POST["pass"];
            $email = $_SESSION["email"];
            //
            //// 1-getting the current passw
            $sql1 = "SELECT password, with_google FROM user WHERE email = '$email'";
            $result1 = mysqli_query($db_connect, $sql1) or die("can't update your phone number");
            $row1 = mysqli_fetch_assoc($result1) or die("Something went wrong");
            if ($row1 and $row1["with_google"] == "true") {
                die("You can't because you logged in with google");
            }
            if ($row1 and $row1["password"] != $curr_ps) {
                die("Your current password is incorrect");
            }
            //
            $sql2 = "UPDATE user SET password = '$ps' WHERE email = '$email'";
            $result2 = mysqli_query($db_connect, $sql2) or die("can't update your password");
            //
            $sql3 = "SELECT password FROM user WHERE password = '$ps'";
            $result3 = mysqli_query($db_connect, $sql3) or die("can't update your password");
            $row3 = mysqli_fetch_assoc($result3);
            if ($row3 and $row3["password"] == $ps) {
                echo "your password updated successfully";
            } else {
                throw new Exception();
            }
        }
    } catch (Exception  $e) {
        echo "Sorry, something went wrong try again later";
    }
    mysqli_close($db_connect);
}
