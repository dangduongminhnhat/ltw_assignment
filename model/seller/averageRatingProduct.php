<?php
function calculateAverageStarsForProduct($mysqli, $idProduct) {
    $query = "SELECT pio.idProduct, ROUND(AVG(ratings.stars), 1) AS average_stars
              FROM product_in_order pio
              JOIN ratings ON pio.idOrder = ratings.idOrder
              WHERE pio.idProduct = ?
              GROUP BY pio.idProduct";

    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, "i", $idProduct);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if there are rows returned
    if ($result) {
        $averageStars = mysqli_fetch_assoc($result);

        // Check if $averageStars is not null
        if ($averageStars !== null) {
            return $averageStars['average_stars'];
        } else {
            // Return a default value if no rows are returned
            return 0.0;
        }
    } else {
        // Return a default value if there's an error with the query
        return 0.0;
    }
}
?>