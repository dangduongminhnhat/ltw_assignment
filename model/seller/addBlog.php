<?php
function addBlog($mysqli, $content, $title, $images) {
    $query = "INSERT INTO `blog` (`content`, `idSeller`, `header`, `image`) VALUES (?, 1, ?, ?)";
    
    $stmt = mysqli_prepare($mysqli, $query);
    if (!$stmt) {
        error_log("Error: " . mysqli_error($mysqli));
        return false;
    }
    
    // Bind parameters with correct types (ss for two strings and an array for images)
    $imageString = implode(',', $images); // Convert array to string
    mysqli_stmt_bind_param($stmt, "sss", $content, $title, $imageString);
    
    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        error_log("Error: " . mysqli_stmt_error($stmt));
        mysqli_stmt_close($stmt);
        return false;
    }

    mysqli_stmt_close($stmt);
    return true;
}
function addBlogWithoutImage($mysqli, $title, $content ) {
    $query = "INSERT INTO `blog` (`content`, `idSeller`, `header`) VALUES (?, 1, ?)";
    
    $stmt = mysqli_prepare($mysqli, $query);
    if (!$stmt) {
        error_log("Error: " . mysqli_error($mysqli));
        return false;
    }
    mysqli_stmt_bind_param($stmt, "ss", $content, $title);
    
    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        error_log("Error: " . mysqli_stmt_error($stmt));
        mysqli_stmt_close($stmt);
        return false;
    }

    mysqli_stmt_close($stmt);
    return true;
}
?>
