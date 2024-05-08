<?php
include_once("../../model/connectdb.php");
function getListOrderWithProduct($mysqli)
{
    $sql_get_list_reported_user = mysqli_query(
        $mysqli,
        "SELECT accounts.userName as userName, total, orders.note as note, orders.total as total, 
        statusOrder,orders.id as idOrder, product.name as proName, product_in_order.price as proPrice,
        product_in_order.quantity as quantity , users.isReported as isReported, users.idAccount as idAccount, accounts.email as email, accounts.phone as phone, dateCreated
        FROM orders, users, accounts, product_in_order, product 
        WHERE idUser = idAccount AND idAccount = accounts.id 
        AND product_in_order.idOrder = orders.id AND product.id = product_in_order.idProduct 
        ORDER BY idOrder DESC;"
    );

    $listuser = array();

    if (mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
function getListOrder($mysqli) {
    $sql_get_list_reported_user = mysqli_query($mysqli,
        "SELECT orders.id as idOrder, statusOrder, userName, total, note, users.isReported, users.idAccount
        FROM orders, users, accounts
        WHERE idUser = idAccount AND idAccount = accounts.id ORDER BY idOrder DESC;");

    $listuser = array();

    if(mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
$orders = getListOrder($mysqli);

function getListOrderFromTo($mysqli, $startDate, $endDate) {
    $sql_get_list_reported_user = mysqli_prepare($mysqli,
        "SELECT orders.id as idOrder, statusOrder, total, payment, dateCreated
        FROM orders
        WHERE dateCreated >= ? AND dateCreated <= ? AND payment = 'Ship COD'
        ORDER BY dateCreated ASC;");

    mysqli_stmt_bind_param($sql_get_list_reported_user, 'ss', $startDate, $endDate);
    mysqli_stmt_execute($sql_get_list_reported_user);
    $result = mysqli_stmt_get_result($sql_get_list_reported_user);

    $listOrders = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $listOrders[] = $row;
    }

    mysqli_stmt_close($sql_get_list_reported_user);

    return $listOrders;
}

function getListOrderFromToNotPaid($mysqli, $startDate, $endDate) {
    $sql_get_list_reported_user = mysqli_prepare($mysqli,
        "SELECT orders.id as idOrder, statusOrder, total, payment, dateCreated
        FROM orders
        WHERE dateCreated >= ? AND dateCreated <= ? AND payment='MOMO'
        ORDER BY dateCreated ASC;");

    mysqli_stmt_bind_param($sql_get_list_reported_user, 'ss', $startDate, $endDate);
    mysqli_stmt_execute($sql_get_list_reported_user);
    $result = mysqli_stmt_get_result($sql_get_list_reported_user);

    $listOrders = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $listOrders[] = $row;
    }

    mysqli_stmt_close($sql_get_list_reported_user);

    return $listOrders;
}
function getListOrderCompleted($mysqli) {
    $sql_get_list_reported_user = mysqli_query($mysqli,
        "SELECT accounts.userName as userName, total, orders.note as note, orders.total as total, 
        statusOrder,orders.id as idOrder, product.name as proName, product_in_order.price as proPrice,
        product_in_order.quantity as quantity , users.isReported as isReported, users.idAccount as idAccount, accounts.email as email, accounts.phone as phone, dateCreated
        FROM orders, users, accounts, product_in_order, product 
        WHERE idUser = idAccount AND idAccount = accounts.id 
        AND product_in_order.idOrder = orders.id AND product.id = product_in_order.idProduct AND statusOrder = 'Đã hoàn thành' ORDER BY idOrder DESC;");

    $listuser = array();

    if(mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
function getListOrderPreparedPage($mysqli) {
    $sql_get_list_reported_user = mysqli_query($mysqli,
        "SELECT accounts.userName as userName, total, orders.note as note, orders.total as total, 
        statusOrder,orders.id as idOrder, product.name as proName, product_in_order.price as proPrice,
        product_in_order.quantity as quantity , users.isReported as isReported, users.idAccount as idAccount, accounts.email as email, accounts.phone as phone, dateCreated
        FROM orders, users, accounts, product_in_order, product 
        WHERE idUser = idAccount AND idAccount = accounts.id 
        AND product_in_order.idOrder = orders.id AND product.id = product_in_order.idProduct AND statusOrder = 'Chờ chuẩn bị' ORDER BY idOrder DESC;;");

    $listuser = array();

    if(mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
function getListOrderDeliveriedPage($mysqli) {
    $sql_get_list_reported_user = mysqli_query($mysqli,
        "SELECT accounts.userName as userName, total, orders.note as note, orders.total as total, 
        statusOrder,orders.id as idOrder, product.name as proName, product_in_order.price as proPrice,
        product_in_order.quantity as quantity , users.isReported as isReported, users.idAccount as idAccount, accounts.email as email, accounts.phone as phone, dateCreated
        FROM orders, users, accounts, product_in_order, product 
        WHERE idUser = idAccount AND idAccount = accounts.id 
        AND product_in_order.idOrder = orders.id AND product.id = product_in_order.idProduct AND statusOrder = 'Đang giao hàng' ORDER BY idOrder DESC;");

    $listuser = array();

    if(mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}