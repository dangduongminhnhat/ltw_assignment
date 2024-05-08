<?php
function getReportedProduct($mysqli) {
    $sql_get_products = mysqli_query($mysqli,
        "SELECT product.id AS product_id, product.name,  product.image, product.isHidden,
            report.content, report.timeReport, accounts.id AS account_id, accounts.userName, users.isReported
        FROM product
        INNER JOIN report ON product.id = report.idProduct
        INNER JOIN accounts ON report.idAccount = accounts.id
        LEFT JOIN users ON accounts.id = users.idAccount
        WHERE product.isReported = 1 AND product.isDeleted = 0
        ORDER BY report.timeReport");

    $products = array();

    if(mysqli_num_rows($sql_get_products) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_products)) {
            $products[] = $row;
        }
    }

    return $products;
}
?>
