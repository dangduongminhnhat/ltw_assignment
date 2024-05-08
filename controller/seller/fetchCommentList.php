<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/fetchCommentList.php");


function fetchCommentList($blogID) {
    global $mysqli;

    return getCommentList($mysqli, $blogID);
}
?>
