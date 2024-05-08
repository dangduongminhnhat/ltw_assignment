<?php
function calculateRatingForProduct($mysqli, $idProduct) {
    
    $rating = 0;

    $query = "SELECT DISTINCT idOrder FROM ratings";

    // Execute the query
    $result = mysqli_query($mysqli, $query);

    // Check if the query was successful
    if ($result) {
        // Loop through each idOrder
        while ($row = mysqli_fetch_assoc($result)) {
            $idOrder = $row['idOrder'];
            
            $check_query = "SELECT COUNT(*) AS count FROM product_in_order WHERE idProduct = ? AND idOrder = ?";
            $stmt = mysqli_prepare($mysqli, $check_query);
            mysqli_stmt_bind_param($stmt, "ii", $idProduct, $idOrder);
            mysqli_stmt_execute($stmt);
            $result_check = mysqli_stmt_get_result($stmt);
            $row_check = mysqli_fetch_assoc($result_check);
            
            if ($row_check['count'] > 0) {
                $rating++;
            }
        }
    }

    return $rating;
}

?>
