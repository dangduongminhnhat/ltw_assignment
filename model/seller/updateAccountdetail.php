<?php
function updateAccountdetail($mysqli, $accountID, $account, $passw, $nameshop, $address, $emailcontact, $phonecontact, $fblink, $instalink, $tiktoklink, $money, $status){
    $query1 = "UPDATE sellers SET nameStore = '$nameshop', address = '$address', tiktok = '$tiktoklink', instagram = '$instalink', 
    facebook = '$fblink', isClose = '$status', money = '$money'
    WHERE idAccount = '$accountID'";
    $passw = hash("sha256", $passw);

    $query2 = "UPDATE accounts SET email = '$emailcontact', pass = '$passw', phone = '$phonecontact', userName = '$account'
    WHERE id = '$accountID'";

    $result1 = mysqli_query($mysqli,$query1);
    $result2 = mysqli_query($mysqli,$query2);

    return ($result1 && $result2);
}
?>
