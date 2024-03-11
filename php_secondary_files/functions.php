<?php

/*
    ** check if date1 is smaller than date2 , if yes return 1 else return 0
*/
function check_greater_btwn_dates($date1, $date2)
{
    $d1 = date_create($date1); // ex: "2022-8-16"
    $d2 = date_create($date2); // ex: "2022-09-09"
    $diff = 1;
    if ($d1 >= $d2) {
        $diff = 0;
    }
    return $diff;
}
