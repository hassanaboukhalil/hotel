<?php

session_start();
session_regenerate_id();
if (isset($_SESSION["email"])) {
    $email = trim(strip_tags(htmlspecialchars($_SESSION["email"])));
    include("../cred.php");

    $classic_rooms = [];
    $superior_rooms = [];
    $deluxe_rooms = [];

    if (false) { // isset($_SESSION["all_rooms"])
        $all_rooms = $_SESSION["all_rooms"];
    } else {
        $sql = "SELECT DISTINCT type, guests_nb, king_beds, single_beds, price FROM rooms";
        $result = mysqli_query($db_connect, $sql) or die("can't receive data from database");
        while ($row = mysqli_fetch_assoc($result)) {
            $tp = $row["type"];
            $gst_nb = $row["guests_nb"];
            $kg = $row["king_beds"];
            $sg = $row["single_beds"];
            if ($row["type"] == "classic") {
                $sql2 = "SELECT count(*) as room_quantity FROM  rooms WHERE type = 'classic' AND guests_nb = $gst_nb AND king_beds = $kg AND single_beds = $sg";
                $result2 = mysqli_query($db_connect, $sql2) or die("can't receive data from database");
                $row2 = mysqli_fetch_assoc($result2);
                $row["room_quantity"] = $row2["room_quantity"];
                array_push($classic_rooms, $row);
            } elseif ($row["type"] == "superior") {
                $sql2 = "SELECT count(*) as room_quantity FROM  rooms WHERE type = 'superior' AND guests_nb = $gst_nb AND king_beds = $kg AND single_beds = $sg";
                $result2 = mysqli_query($db_connect, $sql2) or die("can't receive data from database");
                $row2 = mysqli_fetch_assoc($result2);
                $row["room_quantity"] = $row2["room_quantity"];
                array_push($superior_rooms, $row);
            } else {
                $sql2 = "SELECT count(*) as room_quantity FROM  rooms WHERE type = 'deluxe' AND guests_nb = $gst_nb AND king_beds = $kg AND single_beds = $sg";
                $result2 = mysqli_query($db_connect, $sql2) or die("can't receive data from database");
                $row2 = mysqli_fetch_assoc($result2);
                $row["room_quantity"] = $row2["room_quantity"];
                array_push($deluxe_rooms, $row);
            }
        }


        $all_rooms["classic"] = $classic_rooms;
        $all_rooms["superior"] = $superior_rooms;
        $all_rooms["deluxe"] = $deluxe_rooms;

        $_SESSION["all_rooms"] = $all_rooms;
    }

    $all_booked = [];
    $booked_classic = [];
    $booked_superior = [];
    $booked_deluxe = [];
    $sql = "SELECT rooms.id, rooms.type, rooms.guests_nb, rooms.king_beds, rooms.single_beds, booked_rooms.from_date, booked_rooms.to_date  FROM rooms INNER JOIN booked_rooms ON rooms.id = booked_rooms.room_id ORDER BY rooms.id";
    $result = mysqli_query($db_connect, $sql) or die("can't receive data from database");
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["type"] == "classic") {
            array_push($booked_classic, $row);
        } elseif ($row["type"] == "superior") {
            array_push($booked_superior, $row);
        } else {
            array_push($booked_deluxe, $row);
        }
        $all_booked["classic"] = $booked_classic;
        $all_booked["superior"] = $booked_superior;
        $all_booked["deluxe"] = $booked_deluxe;
    }



    $all_data["all_rooms"] = $all_rooms;
    $all_data["all_booked"] = $all_booked;

    echo json_encode($all_data);
}
