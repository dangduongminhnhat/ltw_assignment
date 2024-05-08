<?php
include_once("../../model/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the POST request
    $data = json_decode(file_get_contents("php://input"));
    $startDate = mysqli_real_escape_string($mysqli, $data->startDate); // Use -> instead of $
    $endDate = mysqli_real_escape_string($mysqli, $data->endDate);
    // Include the file containing the function to fetch orders
    include_once '../../model/seller/fetchOrder.php';

    // Get orders
    $orders = getListOrderFromTo($mysqli, $startDate . ' 00:00:00', $endDate . ' 23:59:59');

    // Encode orders as JSON and echo the result
    header('Content-Type: application/json');
    echo json_encode($orders);
}
?>
