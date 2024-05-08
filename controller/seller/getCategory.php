<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/getCategory.php");

function fetchCategory() {
    global $mysqli;

    return getCategory($mysqli);
}
?>
