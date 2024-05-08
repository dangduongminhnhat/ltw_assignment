<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/getUserdetail.php");

function fetchUserDetail($userID) {
    global $mysqli;
        return getUserDetail($mysqli, $userID);
    }
?>
