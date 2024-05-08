<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/BTL/public/css/styles_register.css">
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
    <div class="register">
        <img src="/BTL/public/images/fork2.png" alt="Logo">
        <h1 id="UniEat">UniEat</h1>
        <h2>WELLCOME TO UNIEAT?</h2>
        <form id="login_infor">
            <input type="text" id="username" name="username" placeholder="Enter username"><br>
            <div id="error_username" style="display: none"></div>
            <input type="text" id="phone" name="phone" placeholder="Enter your phone number"><br>
            <div id="error_phone" style="display: none"></div>
            <input type="text" id="mail" name="mail" placeholder="Enter your email"><br>
            <div id="error_mail" style="display: none"></div>
            <input type="password" id="pass" name = "pass" placeholder="Enter your password"><br>
            <div id="error_pass" style="display: none"></div>
            <input type="password" id="pass_again" name = "pass_again" placeholder="Enter your password again"><br>
            <div id="error_pass_again" style="display: none"></div>
            <button id="register_button" type="button" onclick="call_register()" >REGISTER</button>
        </form>
        <div class="switch_to_signin">
            <p style="margin-right: 5px;">Already a member?</p>
            <a href="./login1.php">Login</a>
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
        /*check input username */
        const username = document.getElementById("username")
        const error_username = document.getElementById("error_username")
        username.addEventListener('blur', checkInputUsername)

        function checkInputUsername() {
            const inputText = username.value;
            if (inputText.trim() === '') {
                error_username.style.display = 'block'
                error_username.style.height = '30px'
                error_username.style.color = 'red'
                error_username.textContent = "Input text shouldn't empty.";
            }
            if (inputText.trim() !== '') {
                error_username.style.display = 'none';
                return true;
            }
        }

        /*check input phone*/
        const phone = document.getElementById("phone")
        const error_phone = document.getElementById("error_phone")

        phone.addEventListener('blur', checkInputPhone)

        function checkInputPhone() {
            const inputText = phone.value;
            const phoneRegex = /^\d{10}$/;
            if (inputText.trim() === '' || !phoneRegex.test(inputText)) {
                error_phone.style.display = 'block'
                error_phone.style.height = '30px'
                error_phone.style.color = 'red'
                if (inputText.trim() === ''){
                    error_phone.textContent = "Input text shouldn't empty.";
                }
                else{
                    error_phone.textContent = "Input text should be a phone number"
                }
            }
            if (phoneRegex.test(inputText)) {
                error_phone.style.display = 'none';
                return true;
            }
        }

        /*check input mail*/

        const mail = document.getElementById("mail")
        const error_mail = document.getElementById("error_mail")
        mail.addEventListener('blur', checkInputMail)

        function checkInputMail(){
            const inputText = mail.value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (inputText.trim() === '' || !emailRegex.test(inputText)) {
                error_mail.style.display = 'block'
                error_mail.style.height = '30px'
                error_mail.style.color = 'red'
                if (inputText.trim() === ''){
                    error_mail.textContent = "Input text shouldn't empty.";
                }
                else{
                    error_mail.textContent = "Input text should be an email."
                }
            }
            if (emailRegex.test(inputText)) {
                error_mail.style.display = 'none';
                return true;
            }
        }

        /*check input pass*/
        const pass = document.getElementById("pass")
        const error_pass = document.getElementById("error_pass")

        pass.addEventListener('blur', checkInputPass)

        function checkInputPass() {
            const inputText = pass.value;
            if (inputText.trim() === ''|| inputText.length < 8 || !/[a-z]/.test(inputText) || !/[A-Z]/.test(inputText) || !/\d/.test(inputText) || !/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(inputText)) {
                error_pass.style.display = 'block'
                error_pass.style.height = '30px'
                error_pass.style.color = 'red'
                if(inputText.trim() === ''){
                    error_pass.textContent = "Password shouldn't empty."
                }
                else if (inputText.length < 8){
                    error_pass.textContent = "Password should be at least 8 characters long.";
                }
                else{
                    error_pass.textContent = "Password should contain lowercase, uppercase, number and special character."
                }
            }
            if (inputText.length >= 8 && /[a-z]/.test(inputText) && /[A-Z]/.test(inputText) && /\d/.test(inputText) && /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(inputText)) {
                error_pass.style.display = 'none';
                return true;
            }
        }

        /*check pass and pass_again*/
        const pass_again = document.getElementById("pass_again")
        const error_pass_again = document.getElementById("error_pass_again")
        pass.addEventListener('blur', checkInputPassAgain)

        function checkInputPassAgain(){
            const inputText = pass_again.value;
            if (inputText.trim() === ''|| inputText !== pass.value) {
                error_pass_again.style.display = 'block'
                error_pass_again.style.height = '30px'
                error_pass_again.style.color = 'red'
                if(inputText.trim() === ''){
                    error_pass_again.textContent = "Shouldn't empty."
                }
                else{
                    error_pass_again.textContent = "Shouldn't different from password."
                }
            }
            if (inputText === pass.value) {
                error_pass_again.style.display = 'none';
                return true;
            }
        }

        function call_register(){
            if (checkInputMail() && checkInputPass() && checkInputPhone() && checkInputUsername() && checkInputPassAgain()){
                const formData = {
                username: document.getElementById("username").value,
                phone: document.getElementById("phone").value,
                mail: document.getElementById("mail").value,
                pass: document.getElementById("pass").value
            }
            fetch('../../controller/default/register_controller.php', {
                method: 'POST',
                headers: {
                'Content-Type': 'application/json' 
                },
                body: JSON.stringify(formData)
            })
            .then(response =>response.json())
            .then(data =>{
                if(data['Register successful']){
                    alert("Register successfull, login please.")
                    window.location.href = 'login1.php';
                }
                else{
                    alert("Register failed.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
            }
        }
    </script>
</body>
</html>