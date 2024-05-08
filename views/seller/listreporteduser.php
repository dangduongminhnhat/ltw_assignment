<div class="col align-items-center justify-content-center mt-3 me-3">
    <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=mainpage" class="text-decoration-none" style="color: black;">Trang
                    chủ</a></li>
            <li class="breadcrumb-item"><a href="?page=community" class="text-decoration-none" style="color: black;">Giao
                    tiếp</a></li>
            <li class="breadcrumb-item"><a href="?page=listreporteduser" class="text-decoration-none" style="color: black;">Danh sách khách hàng bị chặn</a></li>
        </ol>
    </nav>
    <style>
        table {
            text-align: center;
        }

        th,
        td {
            text-align: center;
        }
    </style>
    <?php
    $stt = 1;
    ?>
    <div class="table-responsive justify-content-center mt-3 ms-5 me-5 mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Khách hàng</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once('../../model/connectdb.php');
                include_once("../../controller/seller/getListReportedUser.php");
                $userlist = fetchListReportedUser();
                foreach ($userlist as $itemmuser) {
                ?>
                    <tr class="table-warning">
                        <th scope="row"><?php echo $stt++ ?></th>
                        <td><?php echo $itemmuser['idAccount']; ?></td>
                        <td><?php echo $itemmuser['userName']; ?></td>
                        <td><?php echo $itemmuser['email']; ?></td>
                        <td><?php echo $itemmuser['phone']; ?></td>
                        <td><span class="text-decoration-underline fw-bold" style="color:red" onclick="unblockUser(<?php echo $itemmuser['idAccount']; ?>)">Gỡ chặn</span></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>


    </div>
</div>
<!-- content -->
<script>
    function unblockUser(userID) {
        console.log("User ID:", userID);
        var confirmation = confirm("Xác nhận gỡ chặn khách hàng này?");
        if (!confirmation) {
            return;
        }
        fetch('../../controller/seller/unblockUser.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    userID: userID
                }),
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=listreporteduser";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

    }
</script>