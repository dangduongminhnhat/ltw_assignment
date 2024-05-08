<div class="col align-items-center justify-content-center mt-3 me-3" style="margin-bottom: 50px">
    <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="?page=mainpage" class="text-decoration-none" style="color: black; font-size: large">Trang
                    chủ</a>
            </li>
        </ol>
    </nav>
    <div class="ms-5 border border-solid rounded mb-5" style="width: 90%; border-width: 1px; border-radius: 5px">
        <h5 class="ms-5 mt-3">Thống kê tình trạng kinh doanh</h5>
        <?php
        include_once ("../../controller/seller/countOrders.php");
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center">
                    <div class="text-center">
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold">
                            <?php
                            $ordersCount = countOrdersPrepared();
                            echo $ordersCount;
                            ?>
                        </h5>
                        <p>Đơn hàng chờ chuẩn bị</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold">
                            <?php
                            $ordersCountDelivery = countOrdersDelivery();
                            echo $ordersCountDelivery;
                            ?>
                        </h5>
                        <p>Đơn hàng chờ nhận hàng</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold">
                            <?php
                            $ordersCountDone = countOrdersDone();
                            echo $ordersCountDone;
                            ?>
                        </h5>
                        <p>Đơn hàng đã hoàn thành</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold">
                            <?php
                            $ordersCountCancel = countOrdersCancel();
                            echo $ordersCountCancel;
                            ?>
                        </h5>
                        <p>Đơn bị hủy</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold">
                            <?php
                            $ordersCountReportProduct = countReportedProduct();
                            echo $ordersCountReportProduct;
                            ?>
                        </h5>
                        <p>Sản phẩm bị báo cáo</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold">
                            <?php
                            $ordersCountEmpty = countEmptyProduct();
                            echo $ordersCountEmpty;
                            ?>
                        </h5>
                        <p>Sản phẩm hết hàng</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold">
                            <?php
                            $ordersCountTotal = countOrders();
                            echo $ordersCountTotal;
                            ?>
                        </h5>
                        <p>Đơn hàng</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold">
                            <?php
                            $percentage = ($ordersCountCancel / $ordersCountTotal) * 100;
                            echo $percentage . '%';
                            ?>
                        </h5>
                        <p>Tỉ lệ đơn thất bại</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col align-items-center justify-content-center mt-3 me-3" style="margin-bottom: 50px">
    <?php
    include_once ("../../controller/seller/calculateRevenue.php");
    ?>
    <div class="ms-5 border border-solid rounded mb-5" style="width: 90%;border-width: 1px; border-radius: 5px;">
        <h4 class="ms-5 mt-3">Tổng quan</h4>
        <h5 class="ms-5 mt-3" style="color: green;">Tiền mặt</h5>
        <div class="container">
            <div class="row">
                <?php
                $todayDate = date("Y-m-d");
                $todayRevenue = getRevenue($todayDate . ' 00:00:00', $todayDate . ' 23:59:59');
                $formattedTodayRevenue = number_format($todayRevenue, 0, ',', '.') . 'đ';
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center">
                    <div class="text-center">
                        <p>Hôm nay</p>
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold;">
                            <?php echo $formattedTodayRevenue; ?>
                        </h5>
                    </div>
                </div>
                <?php
                $currentDate = date("Y-m-d");
                $startOfWeek = date("Y-m-d", strtotime("last Monday", strtotime($currentDate)));
                $endOfWeek = date("Y-m-d", strtotime("next Sunday", strtotime($currentDate)));
                $weeklyRevenue = getRevenue($startOfWeek . ' 00:00:00', $endOfWeek . ' 23:59:59');
                $formattedWeeklyRevenue = number_format($weeklyRevenue, 0, ',', '.') . 'đ';
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <p>Tuần này</p>
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold;">
                            <?php echo $formattedWeeklyRevenue; ?>
                        </h5>
                    </div>
                </div>
                <?php
                $currentYear = date("Y");
                $currentMonth = date("m");
                $startOfMonth = $currentYear . '-' . $currentMonth . '-01';
                $endOfMonth = date("Y-m-t", strtotime($startOfMonth));
                $monthlyRevenue = getRevenue($startOfMonth . ' 00:00:00', $endOfMonth . ' 23:59:59');
                $formattedMonthlyRevenue = number_format($monthlyRevenue, 0, ',', '.') . 'đ'; ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <p>Tháng này</p>
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold;">
                            <?php echo $formattedMonthlyRevenue; ?>
                        </h5>
                    </div>
                </div>
                <?php
                $totalRevenue = getAllRevenue();
                $formattedRevenue = number_format($totalRevenue, 0, ',', '.') . 'đ';
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <p>Tổng cộng</p>
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold;"><?php echo $formattedRevenue; ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <hr class="hr hr-blurry" />
        <h5 class="ms-5 mt-3" style="color: red;">Chuyển khoản</h5>
        <div class="container mb-2">
            <div class="row">
                <?php
                $todayDate = date("Y-m-d");
                $todayNotPaid = getNotPaid($todayDate . ' 00:00:00', $todayDate . ' 23:59:59');
                $formattedTodayNotPaid = number_format($todayNotPaid, 0, ',', '.') . 'đ';
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center">
                    <div class="text-center">
                        <p>Hôm nay</p>
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold;">
                            <?php echo $formattedTodayNotPaid; ?>
                        </h5>
                    </div>
                </div>
                <?php
                $currentDate = date("Y-m-d");
                $startOfWeek = date("Y-m-d", strtotime("last Monday", strtotime($currentDate)));
                $endOfWeek = date("Y-m-d", strtotime("next Sunday", strtotime($currentDate)));
                $weeklyNotPaid = getNotPaid($startOfWeek . ' 00:00:00', $endOfWeek . ' 23:59:59');
                $formattedWeeklyNotPaid = number_format($weeklyNotPaid, 0, ',', '.') . 'đ';
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <p>Tuần này</p>
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold;">
                            <?php echo $formattedWeeklyNotPaid; ?>
                        </h5>
                    </div>
                </div>
                <?php
                $currentYear = date("Y");
                $currentMonth = date("m");
                $startOfMonth = $currentYear . '-' . $currentMonth . '-01';
                $endOfMonth = date("Y-m-t", strtotime($startOfMonth));
                $monthlyNotPaid = getNotPaid($startOfMonth . ' 00:00:00', $endOfMonth . ' 23:59:59');
                $formattedMonthlyNotPaid = number_format($monthlyNotPaid, 0, ',', '.') . 'đ'; ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <p>Tháng này</p>
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold;">
                            <?php echo $formattedMonthlyNotPaid; ?>
                        </h5>
                    </div>
                </div>
                <?php
                $totalNotPaid = getAllNotPaid();
                $formattedNotPaid = number_format($totalNotPaid, 0, ',', '.') . 'đ';
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <p>Tổng cộng</p>
                        <h5 class="d-inline" style="color: #FFC700; font-weight: bold;"><?php echo $formattedNotPaid; ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ms-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="paid-tab" data-bs-toggle="tab" data-bs-target="#paid" type="button"
                    role="tab" aria-controls="paid" aria-selected="true">Tiền mặt</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="notpaid-tab" data-bs-toggle="tab" data-bs-target="#notpaid" type="button"
                    role="tab" aria-controls="notpaid" aria-selected="false">Chuyển khoản</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="paid" role="tabpanel" aria-labelledby="paid-tab">
                <div class="d-flex mt-3 mb-3">
                    <label for="startDatePaid" style="margin-right: 10px;">Bắt đầu</label>
                    <input id="startDatePaid" class="form-control" type="date" style="width: 150px;" />
                    <label for="endDatePaid" style="margin-left: 20px; margin-right: 10px;">Kết thúc</label>
                    <input id="endDatePaid" class="form-control" type="date" style="width: 150px;" />
                    <button id="fetchOrdersBtn" class="btn btn-primary" style="margin-left: 20px;"
                        onclick="fetchOrders()">Tìm kiếm</button>

                </div>
                <div class="ms-5 border border-solid rounded" style="width: 90%;border-width: 1px; border-radius: 5px;">
                    <div style="overflow-y: auto; max-height: 300px;">
                        <table id="ordersTable" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Giá tiền</th>
                                </tr>
                            </thead>
                            <tbody id="ordersTableBody">
                                <!-- Table body will be filled by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="notpaid" role="tabpanel" aria-labelledby="notpaid-tab">
            <div class="d-flex mt-3 mb-3">
                <label for="startDate" style="margin-right: 10px;">Bắt đầu</label>
                <input id="startDate" class="form-control" type="date" style="width: 150px;" />
                <label for="endDate" style="margin-left: 20px; margin-right: 10px;">Kết thúc</label>
                <input id="endDate" class="form-control" type="date" style="width: 150px;" />
                <button id="fetchOrdersNotPaid" class="btn btn-primary" style="margin-left: 20px;"
                    onclick="fetchOrdersNotPaid()">Tìm kiếm</button>
            </div>
            <div class="ms-5 border border-solid rounded" style="width: 90%;border-width: 1px; border-radius: 5px;">
                <div style="overflow-y: auto; max-height: 300px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Giá tiền</th>
                            </tr>
                        </thead>
                        <tbody id="ordersNotPaidTableBody">
                            <!-- Table body will be filled by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function viewDetails(orderID) {
        console.log("Viewing details of order with ID:", orderID);
        var redirectTo = "http://localhost/BTL/views/seller/index.php?page=orderdetail&orderID=" + orderID;;
    
    // Redirect to the specified page
    window.location.href = redirectTo;
        
    }
    var today = new Date().toISOString().split('T')[0];
    document.getElementById('startDate').value = today;
    document.getElementById('endDate').value = today;
    document.getElementById('startDatePaid').value = today;
    document.getElementById('endDatePaid').value = today;
    function fetchOrders() {
        var startDate = document.getElementById('startDatePaid').value;
        var endDate = document.getElementById('endDatePaid').value;
        console.log(startDate)
        fetch('../../controller/seller/displayOrder.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ startDate: startDate, endDate: endDate })
        })
            .then(response => response.json())
            .then(data => {
                console.log("ahihi")
                console.log(data)
                var ordersTableBody = document.getElementById('ordersTableBody');
                ordersTableBody.innerHTML = '';
                data.forEach(function (order) {
                    var row = '<tr onclick="viewDetails(\'' + order.idOrder + '\')" style="cursor: pointer;">';
                    row += '<td>' + order.idOrder + '</td>';
                    row += '<td>' + order.statusOrder + '</td>';
                    row += '<td>' + order.dateCreated + '</td>';
                    var formattedTotal = (order.total / 1000).toFixed(3) + ' đ'; // Dividing by 1000 to convert to thousands
                    row += '<td>' + formattedTotal + '</td>';
                    row += '</tr>';
                    ordersTableBody.innerHTML += row;
                });
            })
            .catch(error => console.error('Error:', error));
    }
    function fetchOrdersNotPaid() {
        var startDate = document.getElementById('startDate').value;
        var endDate = document.getElementById('endDate').value;
        console.log(startDate)
        fetch('../../controller/seller/displayOrderNotPaid.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ startDate: startDate, endDate: endDate })
        })
            .then(response => response.json())
            .then(data => {
                console.log("ahihi")
                console.log(data)
                var ordersTableBody = document.getElementById('ordersNotPaidTableBody');
                ordersTableBody.innerHTML = '';
                data.forEach(function (order) {
                    var row = '<tr onclick="viewDetails(\'' + order.idOrder + '\')" style="cursor: pointer;">';
                    row += '<td>' + order.idOrder + '</td>';
                    row += '<td>' + order.statusOrder + '</td>';
                    row += '<td>' + order.dateCreated + '</td>';
                    var formattedTotal = (order.total / 1000).toFixed(3) + ' đ'; // Dividing by 1000 to convert to thousands
                    row += '<td>' + formattedTotal + '</td>';
                    row += '</tr>';
                    ordersTableBody.innerHTML += row;
                });
            })
            .catch(error => console.error('Error:', error));
    }
</script>