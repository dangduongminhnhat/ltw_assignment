<?php
include_once("../../model/connectdb.php");

function getListBlog($mysqli) {
    $sql_get_list_reported_user = mysqli_query($mysqli,
        "SELECT *
        FROM blog
        WHERE isDelete = 0
        ORDER BY id DESC;");

    $listuser = array();

    if(mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
$blogs = getListBlog($mysqli);

