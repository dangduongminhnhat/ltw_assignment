<div class="col align-items-center justify-content-center mt-3 me-3" style="margin-bottom: 50px">
    <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=mainpage" class="text-decoration-none"
                    style="color: black;font-size: large">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                    style="color: black; font-size: large">Tài chính</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                    style="color: black; font-size: large">Doanh thu</a></li>
        </ol>
    </nav>
    <?php
    include_once ("../../controller/seller/calculateRevenue.php");
    ?>
    <div class="ms-5 border border-solid rounded mb-5" style="width: 90%;border-width: 1px; border-radius: 5px;">
        <h4 class="ms-5 mt-3">Tổng quan</h4>
        <h5 class="ms-5 mt-3" style="color: green;">Đã thanh toán</h5>
        <div class="container">
            <div class="row">
                <?php
                $todayDate = date("Y-m-d");

                // Call the function to calculate total revenue for today
                $todayRevenue = getRevenue($todayDate . ' 00:00:00', $todayDate . ' 23:59:59');

                // Format the revenue amount
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

                // Get the current date
                $currentDate = date("Y-m-d");

                // Calculate the start date of the current week (assuming Monday as the start of the week)
                $startOfWeek = date("Y-m-d", strtotime("last Monday", strtotime($currentDate)));

                // Calculate the end date of the current week (assuming Sunday as the end of the week)
                $endOfWeek = date("Y-m-d", strtotime("next Sunday", strtotime($currentDate)));

                // Call the function to calculate total revenue for the current week
                $weeklyRevenue = getRevenue($startOfWeek . ' 00:00:00', $endOfWeek . ' 23:59:59');

                // Format the revenue amount
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

                // Get the current year and month
                $currentYear = date("Y");
                $currentMonth = date("m");

                // Calculate the start date of the current month
                $startOfMonth = $currentYear . '-' . $currentMonth . '-01';

                // Calculate the end date of the current month
                $endOfMonth = date("Y-m-t", strtotime($startOfMonth));

                // Call the function to calculate total revenue for the current month
                $monthlyRevenue = getRevenue($startOfMonth . ' 00:00:00', $endOfMonth . ' 23:59:59');

                // Format the revenue amount
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
        <h5 class="ms-5 mt-3" style="color: red;">Chưa thanh toán</h5>
        <div class="container mb-2">
            <div class="row">
                <?php
                $todayDate = date("Y-m-d");

                // Call the function to calculate total revenue for today
                $todayNotPaid = getNotPaid($todayDate . ' 00:00:00', $todayDate . ' 23:59:59');

                // Format the NotPaid amount
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

                // Calculate the start date of the current week (assuming Monday as the start of the week)
                $startOfWeek = date("Y-m-d", strtotime("last Monday", strtotime($currentDate)));

                // Calculate the end date of the current week (assuming Sunday as the end of the week)
                $endOfWeek = date("Y-m-d", strtotime("next Sunday", strtotime($currentDate)));

                // Call the function to calculate total revenue for the current week
                $weeklyNotPaid = getNotPaid($startOfWeek . ' 00:00:00', $endOfWeek . ' 23:59:59');

                // Format the NotPaid amount
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

                // Get the current year and month
                $currentYear = date("Y");
                $currentMonth = date("m");

                // Calculate the start date of the current month
                $startOfMonth = $currentYear . '-' . $currentMonth . '-01';

                // Calculate the end date of the current month
                $endOfMonth = date("Y-m-t", strtotime($startOfMonth));

                // Call the function to calculate total revenue for the current month
                $monthlyNotPaid = getNotPaid($startOfMonth . ' 00:00:00', $endOfMonth . ' 23:59:59');

                // Format the NotPaid amount
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
                    role="tab" aria-controls="paid" aria-selected="true">Đã thanh toán</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="notpaid-tab" data-bs-toggle="tab" data-bs-target="#notpaid" type="button"
                    role="tab" aria-controls="notpaid" aria-selected="false">Chưa thanh
                    toán</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="paid" role="tabpanel" aria-labelledby="paid-tab">
                <div class="d-flex mt-3 mb-3">
                    <label for="startDatePaid" style="margin-right: 10px;">Start date</label>
                    <input id="startDatePaid" class="form-control" type="date" style="width: 150px;" />
                    <label for="endDatePaid" style="margin-left: 20px; margin-right: 10px;">End date</label>
                    <input id="endDatePaid" class="form-control" type="date" style="width: 150px;" />
                    <button id="fetchOrdersBtn" class="btn btn-primary" style="margin-left: 20px;"
                        onclick="fetchOrders()">Fetch Orders</button>

                </div>
                <div class="ms-5 border border-solid rounded" style="width: 90%;border-width: 1px; border-radius: 5px;">
                    <div style="overflow-y: auto; max-height: 300px;">
                        <table id="ordersTable" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Phương thức thanh toán</th>
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
                <label for="startDate" style="margin-right: 10px;">Start date</label>
                <input id="startDate" class="form-control" type="date" style="width: 150px;" />
                <label for="endDate" style="margin-left: 20px; margin-right: 10px;">End date</label>
                <input id="endDate" class="form-control" type="date" style="width: 150px;" />
                <button id="fetchOrdersNotPaid" class="btn btn-primary" style="margin-left: 20px;"
                    onclick="fetchOrdersNotPaid()">Fetch Orders</button>
            </div>
            <div class="ms-5 border border-solid rounded" style="width: 90%;border-width: 1px; border-radius: 5px;">
                <div style="overflow-y: auto; max-height: 300px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Phương thức thanh toán</th>
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
                    var row = '<tr>';
                    row += '<td>' + order.idOrder + '</td>';
                    row += '<td>' + order.statusOrder + '</td>';
                    row += '<td>' + order.payment + '</td>';
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
                    var row = '<tr>';
                    row += '<td>' + order.idOrder + '</td>';
                    row += '<td>' + order.statusOrder + '</td>';
                    row += '<td>' + order.payment + '</td>';
                    var formattedTotal = (order.total / 1000).toFixed(3) + ' đ'; // Dividing by 1000 to convert to thousands
                    row += '<td>' + formattedTotal + '</td>';
                    row += '</tr>';
                    ordersTableBody.innerHTML += row;
                });
            })
            .catch(error => console.error('Error:', error));
    }
</script>