<?php
include_once("../../model/connectdb.php");
include_once ('../../model/seller/fetchListBlog.php');

function fetchListBlog() {
    global $mysqli;
    return getListBlog($mysqli);
}
?>
