<?php
function getCommentList($mysqli, $blogID) {

    $sql_get_product_in_order = mysqli_query($mysqli,
        "SELECT *
        FROM comments, accounts, users
        WHERE idBlog = $blogID AND comments.idAccount = accounts.id AND comments.idAccount = users.idAccount");

    $product = array();

    if(mysqli_num_rows($sql_get_product_in_order) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_product_in_order)) {
            $product[] = $row;
        }
    }

    return $product;
}
?>

