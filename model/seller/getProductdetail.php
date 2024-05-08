<?php
function getProductDetailByID($mysqli, $productID) {
    $sql_get_product_detail = mysqli_query($mysqli,
        "SELECT product.id, product.name, product.description, product.isHidden, product.price, product.idCategory, product.image,
            product.quantity
        FROM product
        WHERE product.id = $productID");

    if(mysqli_num_rows($sql_get_product_detail) > 0) {
        return mysqli_fetch_array($sql_get_product_detail);
    } else {
        return null;
    }
}
?>
