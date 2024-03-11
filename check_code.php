<?php
$handle = fopen("c.php", "c+");
$line1 = fgets($handle);
$line2 = fgets($handle);
fclose($handle);
$code = substr($line2, 8);
if (isset($_POST["code"])) {
    $entered_code = $_POST["code"];
    if ($entered_code == $code) {
        echo "true";
    } else {
        echo "Wrong code";
    }
}
