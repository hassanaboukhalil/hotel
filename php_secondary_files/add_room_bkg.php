<?php

session_start();
session_regenerate_id();

if (isset($_SESSION["email"])) {
    $email = trim(strip_tags(htmlspecialchars($_SESSION["email"])));
    include("../cred.php");
    include("./functions.php");

    if (isset($_POST["room_id"]) && isset($_POST["from_date"]) && isset($_POST["to_date"])) {
        $rm_id = filter_var($_POST["room_id"], FILTER_SANITIZE_NUMBER_INT);
        $fr_date = trim(strip_tags(htmlspecialchars($_POST["from_date"])));
        $to_date = trim(strip_tags(htmlspecialchars($_POST["to_date"])));
        $rm_tp;
        $gt_nb;
        $kg;
        $sg;


        if ($rm_id == 0 && isset($_POST["room_type"]) && isset($_POST["guests_nb"]) && isset($_POST["kings_nb"]) && isset($_POST["single_nb"])) {

            $rm_tp = trim(strip_tags(htmlspecialchars($_POST["room_type"])));
            $gt_nb = filter_var($_POST["guests_nb"], FILTER_SANITIZE_NUMBER_INT);
            $kg = filter_var($_POST["kings_nb"], FILTER_SANITIZE_NUMBER_INT);
            $sg = filter_var($_POST["single_nb"], FILTER_SANITIZE_NUMBER_INT);

            $ids = [];
            $bkd_rooms = [];
            $can_add = true;


            $sql = "SELECT id FROM rooms WHERE type = '$rm_tp' AND guests_nb = '$gt_nb' AND king_beds = '$kg' AND single_beds = '$sg' ORDER BY id";
            $result = mysqli_query($db_connect, $sql) or die("can't receive data from database");
            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                $row = mysqli_fetch_assoc($result);
                array_push($ids, $row["id"]);
            }


            $sql = "SELECT * FROM booked_rooms INNER JOIN rooms ON booked_rooms.room_id = rooms.id WHERE type = '$rm_tp' AND guests_nb = '$gt_nb' AND king_beds = '$kg' AND single_beds = '$sg' ORDER BY room_id";
            $result = mysqli_query($db_connect, $sql) or die("can't receive data from database");
            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                $row = mysqli_fetch_assoc($result);
                array_push($bkd_rooms, $row);
            }


            for ($i = 0; $i < sizeof($ids); $i++) {
                for ($j = 0; $j < sizeof($bkd_rooms); $j++) {
                    $can_add = true;
                    if ($ids[$i] == $bkd_rooms[$j]["room_id"]) {
                        if (!((check_greater_btwn_dates($fr_date, $bkd_rooms[$j]["from_date"]) == 0 && check_greater_btwn_dates($fr_date, $bkd_rooms[$j]["to_date"]) != 0) || (check_greater_btwn_dates($to_date, $bkd_rooms[$j]["from_date"]) == 0 && check_greater_btwn_dates($to_date, $bkd_rooms[$j]["to_date"]) != 0))) {
                            $can_add = true;
                        } else {
                            $can_add = false;
                            break;
                        }
                    }
                }
                if ($can_add) {
                    $rm_id = $ids[$i];
                    break;
                }
            }
        }




        $sql1 = "SELECT id FROM user WHERE email = '$email'";
        $result1 = mysqli_query($db_connect, $sql1) or die("can't receive data from database");
        $row1 = mysqli_fetch_assoc($result1);
        // $u_id;
        if (sizeof($row1) != 0) {
            $u_id = $row1["id"];

            $sql = "SELECT price FROM rooms WHERE id = $rm_id";
            $result = mysqli_query($db_connect, $sql) or die("can't receive data from database");
            $row = mysqli_fetch_assoc($result);


            //echo sizeof($row);
            if ($row) { // sizeof($row) != 0
                $pr = $row["price"];

                if (isset($_POST["bkg_id"])) {
                    $bkg_id = $_POST["bkg_id"];
                    $sql = "UPDATE booked_rooms SET room_id ='$rm_id',from_date = '$fr_date',to_date='$to_date' WHERE booking_id = $bkg_id";
                } else {
                    $sql = "INSERT INTO booked_rooms (`user_id`, `room_id`,`from_date`, `to_date`) VALUES ('$u_id','$rm_id','$fr_date', '$to_date')";
                }

                if (mysqli_query($db_connect, $sql)) {
                    echo "The room was booked";
                } else {
                    echo "error";
                }
            }
        } else {
            echo "something went wrong try again";
        }
    }
}
