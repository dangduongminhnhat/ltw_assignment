<?php
function countOrdersPreparedModel($mysqli) {
    $query = "SELECT COUNT(*) AS quantity
              FROM orders
              WHERE statusOrder = 'Chờ chuẩn bị' AND isCanceled is NULL";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['quantity'] ?? 0;
    } else {
        return 0;
    }
}
function countOrdersDeliveryModel($mysqli) {
    $query = "SELECT COUNT(*) AS quantity
              FROM orders
              WHERE statusOrder = 'Đang giao hàng' AND isCanceled is NULL";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['quantity'] ?? 0;
    } else {
        return 0;
    }
}
function countOrdersDoneModel($mysqli) {
    $query = "SELECT COUNT(*) AS quantity
              FROM orders
              WHERE statusOrder = 'Đã hoàn thành' AND isCanceled IS NULL";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['quantity'] ?? 0;
    } else {
        return 0;
    }
}
function countOrdersCancelModel($mysqli) {
    $query = "SELECT COUNT(*) AS quantity
              FROM orders
              WHERE isCanceled = 1";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['quantity'] ?? 0;
    } else {
        return 0;
    }
}
function countOrdersModel($mysqli) {
    $query = "SELECT COUNT(*) AS quantity
              FROM orders
              ";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['quantity'] ?? 0;
    } else {
        return 0;
    }
}
function countReportedProductModel($mysqli) {
    $query = "SELECT COUNT(*) AS quantity
              FROM product
              WHERE isReported = 1
              ";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['quantity'] ?? 0;
    } else {
        return 0;
    }
}
function countEmptyProductModel($mysqli) {
    $query = "SELECT COUNT(*) AS quantity
              FROM product
              WHERE quantity = 0
              ";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['quantity'] ?? 0;
    } else {
        return 0;
    }
}
?>
