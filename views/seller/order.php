<div class="col align-items-center justify-content-center mt-3 me-3">
    <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=mainpage" class="text-decoration-none"
                    style="color: black;font-size: large">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                    style="color: black;font-size: large">Quản lý đơn hàng</a></li>
            <li class="breadcrumb-item"><a href="?page=order" class="text-decoration-none"
                    style="color: black;font-size: large">Tất cả đơn hàng</a></li>
        </ol>
    </nav>
    <div class="ms-5">
        <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="paid-tab" data-bs-toggle="tab" data-bs-target="#paid" type="button"
                    role="tab" aria-controls="paid" aria-selected="true">Tất cả đơn hàng</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="notpaid-tab" data-bs-toggle="tab" data-bs-target="#notpaid" type="button"
                    role="tab" aria-controls="notpaid" aria-selected="false" onclick="fetchOrdersPrepare(1)">Chờ chuẩn
                    bị</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery" type="button"
                    role="tab" aria-controls="delivery" aria-selected="true" onclick="fetchOrdersDelivery(1)">Đang giao
                    hàng</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="done-tab" data-bs-toggle="tab" data-bs-target="#done" type="button"
                    role="tab" aria-controls="done" aria-selected="true" onclick="fetchOrdersDone(1)">Đã hoàn
                    thành</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="paid" role="tabpanel" aria-labelledby="paid-tab">
                <div class="ms-5 border border-solid rounded mb-5"
                    style="width: 90%; border-width: 1px; border-radius: 5px;">
                    <div class="container" id="orderListContainer">
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" id="paginationAll">
                        </ul>
                    </nav>
                </div>
            </div>


            <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="done-tab">
                <div class="ms-5 border border-solid rounded mb-5"
                    style="width: 90%; border-width: 1px; border-radius: 5px;">
                    <div class="container" id="orderListContainerDone">
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" id="paginationDone">
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="tab-pane fade" id="notpaid" role="tabpanel" aria-labelledby="notpaid-tab">
                <div class="ms-5 border border-solid rounded mb-5"
                    style="width: 90%; border-width: 1px; border-radius: 5px;">
                    <div class="container" id="orderListContainerPrepare">
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" id="paginationPrepare">
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                <div class="ms-5 border border-solid rounded mb-5"
                    style="width: 90%; border-width: 1px; border-radius: 5px;">
                    <div class="container" id="orderListContainerDelivery">
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" id="paginationDelivery">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>


</div>
<script>
    count = 0;
    function fetchOrders(page) {
        $.ajax({
            url: '../../controller/seller/fetchOrderPage.php?page=' + page,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                displayOrders(response.orders, 'orderListContainer');
                generatePagination(response.totalPages, 'paginationAll');
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
    function fetchOrdersDelivery(page) {
        $.ajax({
            url: '../../controller/seller/fetchOrderDelivery.php?page=' + page,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                displayOrders(response.orders, 'orderListContainerDelivery');
                generatePagination(response.totalPages, 'paginationDelivery');
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
    function fetchOrdersDone(page) {
        $.ajax({
            url: '../../controller/seller/fetchOrderDone.php?page=' + page,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                displayOrders(response.orders, 'orderListContainerDone');
                generatePagination(response.totalPages, 'paginationDone');
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
    function fetchOrdersPrepare(page) {
        $.ajax({
            url: '../../controller/seller/fetchOrderPrepare.php?page=' + page,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                displayOrders(response.orders, 'orderListContainerPrepare');
                generatePagination(response.totalPages, 'paginationPrepare');
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
    // Function to display orders for a specific page
    function displayOrders(orders, idDiv) {
        const orderListContainer = document.getElementById(idDiv);
        orderListContainer.innerHTML = ''; // Clear previous orders

        orders.forEach(order => {
            count++;
            // Create HTML elements to display each order
            const orderElement = document.createElement('div');
            orderElement.classList.add('row'); // Add the 'row' class

            // Customize the structure and styling as per your requirement
            orderElement.innerHTML = `
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="d-flex align-items-center ms-2 mt-3">
                    <img class="avatar avatar-48 bg-light rounded-circle text-white p-1" src="https://res.cloudinary.com/hy4kyit2a/f_auto,fl_lossy,q_70/learn/modules/salesforce-b2b-commerce-storefront-experience/support-your-buyers-b2b-journey/images/4889eb0c3f27a0c1a53bc4e89b09bdb4_b-42-aa-2-e-0-1-bc-4-4-cb-9-a-91-e-016914-c-0-a-473.png">
                    <a class="ms-2 text-decoration-none fw-bold" style="color: black;">${order.userName}</a>
                    <a class="ms-4 text-decoration-none text-decoration-underline fw-light" style="color: black;" data-bs-toggle="modal" data-bs-target="#detailUser_${count}">Xem thông tin</a>
                    ${order.isReported == 0 ? `<a class="text-decoration-none text-decoration-underline fw-light ms-4" style="color:red" onclick="reportUser(${order.idAccount})">Chặn</a>` : ''}
                    ${order.isReported == 1 ? `<a class="text-decoration-none text-decoration-underline fw-light ms-4" style="color:red" onclick="unblockUser(${order.idAccount})">Gỡ chặn</a>` : ''}
                </div>
                <div class="modal fade" id="detailUser_${count}" tabindex="-1" aria-labelledby="infoUser" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="infoUser">Thông tin khách hàng</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label" for="username">Tên khách hàng</label>
                                    <input class="form-control" id="username" name="username" type="text" value="${order.userName}" readonly style="width: 100%" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input class="form-control" id="email" name="email" type="text" value="${order.email}" readonly style="width: 100%" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="phonenum">Số điện thoại</label>
                                    <input class="form-control" id="phonenum" name="phonenum" type="number" value="${order.phone}" readonly style="width: 100%" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2" style="margin-bottom: 20px; max-height: 150px; overflow-y: auto;">
                    <table id="orderTable" class="table">
                        <tbody>`;

            // Generate rows for each product within the order
            order.product.forEach(prod => {
                const productRow = createProductRow(prod);
                orderElement.querySelector('tbody').appendChild(productRow);
            });
            if (order.note == null) {
                order.note = 'Không có'
            }
            // Close the table body and table element
            orderElement.innerHTML += `
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <!-- Content for the second column -->
                <div class="mt-5">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Tình trạng</td>
                                <td>${order.statusOrder}</td>
                            </tr>
                            <tr>
                                <td>Mã đơn hàng</td>
                                <td>NYCA${order.idOrder}</td>
                            </tr>
                            <tr>
                                <td>Note</td>
                                <td>${order.note}</td>
                            </tr>
                            <tr>
                                <td>Ngày tạo</td>
                                <td>${order.dateCreated}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Giá trị đơn hàng</td>
                                <td style="font-weight: bold;">
                                ${parseInt(order.total).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",").replace(/(\.[0-9]*[1-9])0+$/, '$1')}đ
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <button class="btn mt-2 mb-2" style="background-color: #FFC700;" onclick="viewDetails('${order.idOrder}')">
                            <i class="fas fa-info-circle"></i> Xem chi tiết
                        </button>
                        ${order.statusOrder == 'Đang giao hàng' ? `
                            <button class="btn mt-2 mb-2" style="background-color: #FFC700;" onclick="completeOrder('${order.idOrder}')">
                                <i class="fas fa-check-circle"></i> Đã hoàn thành
                            </button>` : ''}
                        ${order.statusOrder != 'Đã hoàn thành' && order.statusOrder != 'Đang giao hàng' ? `
                            <button class="btn mt-2 mb-2" style="background-color: #FFC700;" onclick="prepareOrder('${order.idOrder}')">
                                <i class="fas fa-utensils"></i> Chuẩn bị hàng
                            </button>` : ''}
                    </div>
                </div>
            </div>`;

            // Append the order element to the container
            orderListContainer.appendChild(orderElement);
        });

        // Log the orders after they've been fully rendered
        console.log("orders: ", orders);
    }
    function reportUser(userID) {
        console.log("User ID:", userID);
        var confirmation = confirm("Xác nhận chặn khách hàng này?");
        if (!confirmation) {
            return;
        }
        fetch('../../controller/seller/reportUser.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ userID: userID }),
        })
            .then(response => {
                if (response.ok) {
                    window.location.reload();
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

    }
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
            body: JSON.stringify({ userID: userID }),
        })
            .then(response => {
                if (response.ok) {
                    window.location.reload();
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

    }
    // Function to create a row for a product
    function createProductRow(product) {
        const row = document.createElement('tr');
        row.innerHTML = `
        <td>${product.quantity}</td>
        <td>${product.proName}</td>
        <td>${parseInt(product.proPrice).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",").replace(/(\.[0-9]*[1-9])0+$/, '$1')}đ</td>`;
        return row;
    }


    // Function to generate pagination links
    function generatePagination(totalPages, divID) {
        const paginationContainer = document.getElementById(divID);
        paginationContainer.innerHTML = ''; // Clear previous pagination links

        for (let i = 1; i <= totalPages; i++) {
            const pageLink = document.createElement('li');
            pageLink.className = 'page-item';
            pageLink.innerHTML = `<a class="page-link" href="#" onclick="fetchOrders(${i})">${i}</a>`;
            paginationContainer.appendChild(pageLink);
        }
    }

    // Fetch orders when the page loads
    $(document).ready(function () {
        fetchOrders(1);
    });
    function viewDetails(orderID) {
        console.log("Viewing details of order with ID:", orderID);
        var redirectTo = "http://localhost/BTL/views/seller/index.php?page=orderdetail&orderID=" + orderID;;

        // Redirect to the specified page
        window.location.href = redirectTo;

    }

    function prepareOrder(orderID) {
        // Your code to handle preparing the order here
        console.log("Preparing order...", orderID);

        // Make an AJAX request to call the PHP function
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Order status changed to preparing.");
                window.location.reload();
                // You can handle the response here if needed
            }
        };
        xhttp.open("GET", "../../controller/seller/changeOrderStatus.php?action=prepareOrder&orderID=" + orderID, true);
        xhttp.send();
    }

    function completeOrder(orderID) {
        // Your code to handle completing the order here
        console.log("Completing order...", orderID);

        // Make an AJAX request to call the PHP function
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Order status changed to completed.");
                window.location.reload();
                // You can handle the response here if needed
            }
        };
        xhttp.open("GET", "../../controller/seller/changeOrderStatus.php?action=deliveryOrder&orderID=" + orderID, true);
        xhttp.send();
    }
    function reportUser(userID) {
        console.log("User ID:", userID);
        var confirmation = confirm("Xác nhận chặn khách hàng này?");
        if (!confirmation) {
            return;
        }
        fetch('../../controller/seller/reportUser.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ userID: userID }),
        })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=order";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

    }
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
            body: JSON.stringify({ userID: userID }),
        })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=order";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

    }

</script>