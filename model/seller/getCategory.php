<?php
function getCategory($mysqli) {
    $sql_get_list_category = mysqli_query($mysqli, "SELECT id, typeName, image FROM category");

    $category = array();

    if(mysqli_num_rows($sql_get_list_category) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_category)) {
            $category[] = $row;
        }
    }

    return $category;
}
?>
