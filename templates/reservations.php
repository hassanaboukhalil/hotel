<?php

if (isset($_SESSION["email"])) {
    $email = trim(strip_tags(htmlspecialchars($_SESSION["email"])));
    include("./cred.php");
    include("./php_secondary_files/functions.php");
    $sql = "SELECT id FROM user WHERE email = '$email'";
    $result = mysqli_query($db_connect, $sql) or die("can't receive data from database");
    $row = mysqli_fetch_assoc($result);
    if (sizeof($row) != 0) {
        $user_id = $row["id"];
        $sql = "SELECT * FROM booked_rooms INNER JOIN rooms ON booked_rooms.room_id = rooms.id WHERE user_id = '$user_id'";
        $result = mysqli_query($db_connect, $sql) or die("can't receive data from database");
        $row = mysqli_fetch_assoc($result);
        if ($row) {

?>

            <div class="reservations">
                <p class="title">Your Reservations</p>
                <?php
                $today = date("Y-m-d");
                while ($row) {
                    if (check_greater_btwn_dates($today, $row["to_date"]) != 0) {
                ?>
                        <article>
                            <div class="info">
                                <p class="desciption" id="rm_type"><b>Room type : </b><?php echo ucfirst($row["type"]) ?></p>
                                <p class="desciption"><b>Beds : </b><?php echo $row["king_beds"] . " " . (($row["king_beds"] == 1) ? 'King Bed' : 'King Beds') . " and " . $row["single_beds"] . " " . (($row["single_beds"] == 1) ? 'Single Bed' : 'Single Beds') ?></p>
                                <p class="desciption"><b>Room number : </b><?php echo $row["number"] ?></p>
                                <p class="desciption"><b>floor: </b><?php echo $row["floor"] ?></p>
                                <p class="desciption"><b>Check-In : </b><?php echo $row["from_date"] ?></p>
                                <p class="desciption"><b>Check-Out : </b><?php echo $row["to_date"] ?></p>
                                <?php
                                if (check_greater_btwn_dates($today, $row["from_date"]) != 0) {
                                ?>
                                    <button id="update_rm_btn" onclick="open_book_rm_dg('<?php echo ucfirst($row['type']) ?>','<?php echo $row['guests_nb'] ?>','<?php echo $row['king_beds'] ?>','<?php echo $row['single_beds'] ?>','<?php echo $row['from_date'] ?>','<?php echo $row['to_date'] ?>');open_dialog_for_update('<?php echo $row['booking_id'] ?>','<?php echo $row['room_id'] ?>','<?php echo $row['from_date'] ?>','<?php echo $row['to_date'] ?>')">Update</button>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="img" style="background-image: url(<?php if ($row['type'] == "classic") echo './images/rooms/classic_room_images/classic_room1.png';
                                                                            elseif ($row['type'] == "superior") echo './images/rooms/superior_room_images/superior_room1.png';
                                                                            else echo './images/rooms/deluxe_room_images/deluxe_room1.png' ?>);">
                            </div>
                        </article>
                <?php
                    }
                    $row = mysqli_fetch_assoc($result);
                }
                ?>
            </div>
<?php
        }
    } else {
        die("something went wrong");
    }
}


?>