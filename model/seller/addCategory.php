<?php

function addCategory($mysqli,$idcategory, $namecategory, $imagecategory) {

    $query = "INSERT INTO `category` (`id`, `typeName`, `image`) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($mysqli, $query);

    mysqli_stmt_bind_param($stmt, "iss", $idcategory, $namecategory, $imagecategory);

    $success = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $success;
}
?>
