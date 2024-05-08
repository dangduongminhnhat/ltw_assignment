<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/BTL/public/css/styles_login1.css">
    <link href='https://fonts.googleapis.com/css?family=K2D' rel='stylesheet'>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <title>UniEat</title>
    <link rel="apple-touch-icon" sizes="120x120" href="/BTL/public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/BTL/public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/BTL/public/favicon/favicon-16x16.png">
    <link rel="manifest" href="/BTL/public/favicon/site.webmanifest">
    <link rel="mask-icon" href="/BTL/public/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <div class="login">
        <img src="/BTL/public/images/fork2.png" alt="Logo">
        <h1 id="UniEat">UniEat</h1>
        <h2>WELLCOME TO UNIEAT?</h2>
        <form id="login_infor">
            <input type="text" id="phonemail" name="phonemail" placeholder="Enter your email or phone number"><br>
            <div id="error_phonemail" style="display: none"></div>
            <input type="password" id="pass" name = "pass" placeholder="Enter your password"><br>
            <div id="error_pass" style="display: none"></div>
            <button id="login_button" type="button" onclick="call_login()" >LOGIN</button>
        </form>
        <div class="switch_to_signup">
            <p style="margin-right: 5px;">New to UniEat?</p>
            <a href="./register.php">Join now</a>
        </div>
        <div class="or_div">
            <hr class="h_line">
            <p class="or_text">OR</p>
        </div>
        <form>
            <div class="google_w_icon">
                <input type="button" id="google" name="google" value="CONTINUE WITH GOOGLE">
                <span class="iconify" style="font-size: 25px" data-icon="flat-color-icons:google"></span>
            </div>
            <div class="google_w_icon">
                <input type="button" id="facebook" name="facebook" value="CONTINUE WITH FACEBOOK"><br>
                <span class="iconify" style="font-size: 25px" data-icon="logos:facebook"></span>
            </div>
            <div class="google_w_icon">
                <input type="button" id="apple" name="apple" value="CONTINUE WITH APPLE"><br>
                <span class="iconify" style="font-size: 25px" data-icon="devicon:apple"></span>
            </div>
        </form>
    </div>
    <script>
        // CHECK XEM CÓ COOKIE THÌ CHO QUA LUÔN
        window.addEventListener('DOMContentLoaded', function() {
            fetch('../../controller/default/checkCookie.php', {
                headers: {
                'Content-Type': 'application/json' 
                }
            })
            .then(response => response.json())
            .then(data =>{
                if(data['Success']){
                    window.location.href = 'login2.php';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
        
        /*call_login */
        function call_login(){
            const formData = {
                phonemail: document.getElementById("phonemail").value,
                pass: document.getElementById("pass").value
            }
            fetch('../../controller/default/login_controller.php', {
                method: 'POST',
                headers: {
                'Content-Type': 'application/json' 
                },
                body: JSON.stringify(formData)
            })
            .then(response =>response.json())
            .then(data =>{
                if(data['Login successful']){
                    window.location.href = 'login2.php'
                } else {
                    alert("Sai email hoặc mật khẩu");
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>