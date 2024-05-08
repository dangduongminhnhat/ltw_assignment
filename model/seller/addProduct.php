<?php
function addProduct($mysqli, $idsp, $tensp, $category, $price, $soluong, $status, $ship, $description, $image) {
    $query = "INSERT INTO `product` (`id`, `name`, `idCategory`, `price`, `quantity`, `isHidden`, `deliveryType`, `description`, `image`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($mysqli, $query);
    if (!$stmt) {
        error_log("Error: " . $mysqli->error);
        return false;
    }
    mysqli_stmt_bind_param($stmt,"isiiiiiss", $idsp, $tensp, $category, $price, $soluong, $status, $ship, $description, $image);
    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        error_log("Error: " . $stmt->error);
        mysqli_stmt_close($stmt);
        return false;
    }

    mysqli_stmt_close($stmt);
    return true;
}
?>

