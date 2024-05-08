<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/getAccountdetail.php");

function fetchAccountdetail($accountID) {
    global $mysqli;

    return getAccountDetail($mysqli, $accountID);
}
?>
