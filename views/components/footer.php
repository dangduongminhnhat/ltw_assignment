<?php
    $host = "localhost";
    $dbname = "btl_ltw";
    $username = "root";
    $password = "";
    
    $mysqli = new mysqli(hostname: $host,
                         username: $username,
                         password: $password,
                         database: $dbname);
                         
    if ($mysqli->connect_errno) {
        die("Connection error: " . $mysqli->connect_error);
    }
    $query = "SELECT sellers.tiktok, sellers.instagram, sellers.facebook, sellers.nameStore, sellers.address,
                    accounts.phone, accounts.email
            FROM accounts
            INNER JOIN sellers ON accounts.id = sellers.idAccount
            WHERE sellers.idAccount = 1";
    $result = mysqli_query($mysqli, $query);
    $info = mysqli_fetch_assoc($result);            
?>

<footer class="container-fluid " style="width:100%; height: 100% ;background-color:#FFC700">
    <div class="row d-none d-md-none d-lg-flex">
        <div class="col-12 mt-3 mb-3 border-bottom">
            <h2 class="fw-bold ms-3 me-3"><?php echo $info['nameStore']?></h2>
        </div>
        <div class="col-12 me-3 mb-3 border-bottom">
            <div class="row">
                <div class="col-3 d-flex flex-column justify-content-center">
                    <p class="ms-3">Về UniEat</p>
                    <p class="ms-3">Blog</p>
                </div>
                <div class="col-3 d-flex flex-column justify-content-center">
                    <p>Hợp tác với UniEat</p>
                    <p>Trở thành tài xế UniEat</p>
                </div>
                <div class="col-3 d-flex flex-column justify-content-center">
                    <p>Trung tâm hỗ trợ</p>
                    <p>Những câu hỏi thường gặp</p>
                </div>
                <div class="col-3 d-flex flex-row justify-content-center align-items-center">
                    <div class="me-3 ms-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-facebook" viewBox="0 0 16 16" onclick="UniEatFacebook()">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg>
                    </div>
                    <div class="ms-3 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16" onclick="UniEatInstagram()">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                    </div>
                    <div class="me-3 ms-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-tiktok" viewBox="0 0 16 16" onclick="UniEatTiktok()">
                            <path
                                d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex flex row ms-3">
            <h6 class="mt-1">Địa chỉ: <span><?php echo $info['address']?></span></h6>
            <h6 class="mt-1">Liên hệ: <span><?php echo $info['email']?></span> - <span><?php echo $info['phone']?></span></h6>
        </div>
        <div class="col-12 ms-3 me-3 mb-3 mt-3 d-flex flex-row">
            <img src="/BTL/public/images/footer1.png" width="150" height="40" alt="footer1" class="me-3">
            <img src="/BTL/public/images/footer2.png" width="150" height="40" alt="footer1">
        </div>
    </div>
    <div class="d-lg-none d-flex flex-column align-items-center justify-content-center">
        <h6 class="mt-3">Điều khoản và chính sách</h6>
        <h6 class="mt-1">2024 <span><?php echo $info['nameStore']?></span></h6>
        <h6 class="mt-1">Địa chỉ: <span><?php echo $info['address']?></span></h6>
        <h6 class="mt-1">Liên hệ: <span><?php echo $info['email']?></span> - <span><?php echo $info['phone']?></span></h6>
        <div class="d-flex flex-row justify-content-center align-items-center mt-2 mb-3">
            <div class="me-3 ms-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-facebook" viewBox="0 0 16 16" onclick="UniEatFacebook()">
                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                </svg>
            </div>
            <div class="ms-3 me-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-instagram" viewBox="0 0 16 16" onclick="UniEatInstagram()">
                    <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                </svg>
            </div>
            <div class="me-3 ms-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-tiktok" viewBox="0 0 16 16" onclick="UniEatTiktok()">
                    <path
                        d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                </svg>
            </div>
        </div>
    </div>
    <script>
        function UniEatFacebook() {
            var facebookLink = "<?php echo $info['facebook']; ?>";
             window.open(facebookLink, "_blank");
        }
        function UniEatInstagram() {
            var facebookLink = "<?php echo $info['instagram']; ?>";
             window.open(facebookLink, "_blank");
        }
        function UniEatTiktok() {
            var facebookLink = "<?php echo $info['tiktok']; ?>";
             window.open(facebookLink, "_blank");
        }
    </script>
</footer>