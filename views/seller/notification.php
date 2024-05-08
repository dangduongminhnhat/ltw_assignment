<div class="col align-items-center justify-content-center mt-3 me-3">
    <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=mainpage" class="text-decoration-none" style="color: black;">Trang
                    chủ</a></li>
            <li class="breadcrumb-item"><a href="?page=community" class="text-decoration-none" style="color: black;">Giao
                    tiếp</a></li>
            <li class="breadcrumb-item"><a href="?page=notification" class="text-decoration-none" style="color: black;">Thông báo</a></li>
        </ol>
    </nav>
    <div class="justify-content-center mt-2 ms-5 me-5 mb-3">
        <div style="max-height: 700px; overflow-y: auto; overflow-x: hidden;">
            <?php
            include_once("../../controller/seller/getNotification.php");
            $accountID = "1";
            $notifications = fetchNotification($accountID);
            foreach ($notifications as $itemm) {
            ?>
                <div class="border rounded-4 mb-3">
                    <div class="row">
                        <div class="col-md-3 d-none d-md-flex justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FFC700" class="bi bi-cup-hot-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M.5 6a.5.5 0 0 0-.488.608l1.652 7.434A2.5 2.5 0 0 0 4.104 16h5.792a2.5 2.5 0 0 0 2.44-1.958l.131-.59a3 3 0 0 0 1.3-5.854l.221-.99A.5.5 0 0 0 13.5 6zM13 12.5a2 2 0 0 1-.316-.025l.867-3.898A2.001 2.001 0 0 1 13 12.5" />
                                <path d="m4.4.8-.003.004-.014.019a4 4 0 0 0-.204.31 2 2 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.6.6 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3 3 0 0 1-.202.388 5 5 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 3.6 4.2l.003-.004.014-.019a4 4 0 0 0 .204-.31 2 2 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.6.6 0 0 0-.09-.252A4 4 0 0 0 3.6 2.8l-.01-.012a5 5 0 0 1-.37-.543A1.53 1.53 0 0 1 3 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a6 6 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 4.4.8m3 0-.003.004-.014.019a4 4 0 0 0-.204.31 2 2 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.6.6 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3 3 0 0 1-.202.388 5 5 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 6.6 4.2l.003-.004.014-.019a4 4 0 0 0 .204-.31 2 2 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.6.6 0 0 0-.09-.252A4 4 0 0 0 6.6 2.8l-.01-.012a5 5 0 0 1-.37-.543A1.53 1.53 0 0 1 6 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a6 6 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 7.4.8m3 0-.003.004-.014.019a4 4 0 0 0-.204.31 2 2 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.6.6 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3 3 0 0 1-.202.388 5 5 0 0 1-.252.382l-.019.025-.005.008-.002.002A.5.5 0 0 1 9.6 4.2l.003-.004.014-.019a4 4 0 0 0 .204-.31 2 2 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.6.6 0 0 0-.09-.252A4 4 0 0 0 9.6 2.8l-.01-.012a5 5 0 0 1-.37-.543A1.53 1.53 0 0 1 9 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a6 6 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 10.4.8" />
                            </svg>
                        </div>

                        <div class="col-12 col-md-9 d-flex flex-column justify-content-center mt-2 mb-2">
                            <a class="fw-bold text-decoration-none mt-2 mb-2 ms-3" style="color: black;">
                                <span>
                                    <?php if ($itemm['isRead'] == 0) { ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#FFC700" class="bi bi-dot" viewBox="0 0 16 16">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                        </svg>
                                    <?php }
                                    ?>

                                </span>
                                <?php echo $itemm['title']; ?></a>
                            <a class="text-decoration-none mt-2 mb-2 ms-3 me-3" style="color: black;"><?php echo $itemm['message']; ?></a>
                            <a class="text-decoration-none mt-2 mb-2 ms-3 me-3" style="font-size: 13px; color:#A29D9D"><?php echo $itemm['timeNoti']; ?></a>
                            <div class="d-flex flex-row justify-content-center mt-2 mb-2 ms-3 me-3">
                                <?php if ($itemm['isRead'] == 0) { ?>
                                    <button type="button" class="btn btn-outline-warning mt-2 mb-2 me-5" onclick="readNotification(<?php echo $itemm['id']; ?>)">ĐÃ ĐỌC</button>
                                <?php }
                                ?>
                                <button type="button" class="btn btn-outline-warning mt-2 mb-2 me-5" style="color: red;" onclick="deleteNotification(<?php echo $itemm['id']; ?>)">XÓA</button>

                            </div>

                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- content -->
<script>
    function readNotification(notiID) {
        console.log("Notification ID:", notiID);
        var confirmation = confirm("Đánh dấu đã đọc?");
        if (!confirmation) {
            return;
        }
        fetch('../../controller/seller/updateNotistatus.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    notiID: notiID
                }),
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=notification";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function deleteNotification(notiID) {
        console.log("Notification ID:", notiID);
        var confirmation = confirm("Bạn có chắc chắn muốn xóa thông báo này?");
        if (!confirmation) {
            return;
        }
        fetch('../../controller/seller/deleteNoti.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    notiID: notiID
                }),
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=notification";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>