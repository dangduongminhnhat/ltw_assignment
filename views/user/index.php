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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-avatar@latest/dist/avatar.min.css" rel="stylesheet">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet" />
    <?php include 'load_css.php'; ?>
    <link rel="stylesheet" href="/BTL/public/css/header.css" />
</head>
<body>
    <header id="header" class="header">
        <?php include 'views/components/header.php';?>
    </header>
    <?php echo $content; ?>
    <?php
    $page = $_GET['page'] ?? 'homepage';
    if ($page != "user_info") {
        include 'views/components/footer.php';
    }
    ?>
    <script src="/BTL/public/js/scripts.js"></script>
</body>
</html>