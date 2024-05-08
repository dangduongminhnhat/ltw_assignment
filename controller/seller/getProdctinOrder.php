<?php

require_once ("../../model/connectdb.php");
require_once ("../../model/seller/getProductinOrder.php");


function fetchProductInOrder($orderID)
{
    global $mysqli;

    return getProductInOrder($mysqli, $orderID);
}
function fetchProductInOrderAll($orderID)
{
    global $mysqli;
    $orderList = getListOrderAll($mysqli, $orderID);
    $groupedOrders = [];
    foreach ($orderList as $order) {
        $orderId = $order['idOrder'];

        // Check if the order already exists in groupedOrders
        if (isset($groupedOrders[$orderId])) {
            // If yes, append the product to the existing order
            $groupedOrders[$orderId]['product'][] = [
                'proName' => $order['proName'],
                'proPrice' => $order['proPrice'],
                'quantity' => $order['quantity'],
                'proNote' => $order['proNote']
            ];
        } else {
            // If not, create a new order with the product
            $groupedOrders[$orderId] = [
                'userName' => $order['userName'],
                'total' => $order['total'],
                'note' => $order['note'],
                'statusOrder' => $order['statusOrder'],
                'isReported' => $order['isReported'],
                'isCanceled' => $order['isCanceled'],
                'idAccount' => $order['idAccount'],
                'email' => $order['email'],
                'phone' => $order['phone'],
                'payment' => $order['payment'],
                'addr' => $order['addr'],
                'idOrder' => $orderId,
                'dateCreated' => $order['dateCreated'],
                'product' => [
                    [
                        'proName' => $order['proName'],
                        'proPrice' => $order['proPrice'],
                        'quantity' => $order['quantity'],
                        'proNote' => $order['proNote']
                    ]
                ]
            ];
        }
    }
    // Output orders as JSON
    return array_values($groupedOrders); // To reset keys and ensure a consistent JSON array
}

?>