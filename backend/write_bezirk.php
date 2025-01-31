<?php
include 'head.php';
//print_r($_POST);
if (isset($_POST['bezirk']) && isset($_POST['bundesland'])) {
    $bundesland = escape_string($_POST['bundesland']);
    $bundesland = query("SELECT * FROM gemeindekompass360_bundeslander WHERE name='$bundesland'");
    if (mysqli_num_rows($bundesland) == 1) {
        $bundeslandID = fetch_assoc($bundesland)['id'];
        $bezirk = escape_string($_POST['bezirk']);
        $check = query("SELECT * FROM gemeindekompass360_bezirke WHERE name='$bezirk'");
        if (mysqli_num_rows($check) == 0) {
            query("INSERT INTO gemeindekompass360_bezirke VALUES(0, '$bezirk', $bundeslandID)");
            //echo "INSERT INTO gemeindekompass360_bezirke VALUES(0, '$bezirk', $bundeslandID)";
        } else {
            echo "Error";
        }

    } else {
        echo "Error";
    }
}