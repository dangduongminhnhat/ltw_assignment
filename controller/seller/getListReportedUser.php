<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/getListReportedUser.php");

function fetchListReportedUser() {
    global $mysqli;

    return getListReportedUser($mysqli);
}
?>
