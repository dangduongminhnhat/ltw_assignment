<?php
session_start();
$isLogin = isset($_COOKIE["id"]) && isset($_SESSION["id"]) && isset($_SESSION["author"]) && isset($_SESSION["phonemail"]) && isset($_SESSION["phone"]);
if ($isLogin == FALSE) {
  header("location: /BTL/user/homepage");
  exit();
}
if ($_SESSION["author"] == "user") {
  header("location: /BTL/user/homepage");
  exit();
} 
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniEat</title>
    <link rel="apple-touch-icon" sizes="120x120" href="/BTL/public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/BTL/public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/BTL/public/favicon/favicon-16x16.png">
    <link rel="manifest" href="/BTL/public/favicon/site.webmanifest">
    <link rel="mask-icon" href="/BTL/public/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-avatar@latest/dist/avatar.min.css" rel="stylesheet">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet" />
    <?php
    $page = $_GET['page'] ?? 'mainpage';
    if ($page == "community") {
        echo '<link rel="stylesheet" href="/BTL/public/css/styles_sellercommunity.css" />';
        echo '<link rel="stylesheet" href="/BTL/public/css/popup.css" />';
    }
    ?>
</head>
<body>
    <?php include '../components/seller_header.php';?>
    <?php include 'router.php'; ?>
    <?php include '../components/footer.php'; ?>
</body>
</html>