<?php
function deleteBlog($mysqli, $blogID){
    $query = "UPDATE blog SET isDelete = 1
              WHERE id = '$blogID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
?>
