<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/getNotification.php");

function fetchNotification($accountID) {
    global $mysqli;

    return getNotification($mysqli, $accountID);
}
?>
