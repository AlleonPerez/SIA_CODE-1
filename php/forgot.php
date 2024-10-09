<?php
    include("../php/db_config.php");

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        $query = mysqli_query($con, "SELECT * FROM students WHERE email = '$email'");

        if(mysqli_num_rows($query) > 0){
            if($password == $confirmPassword){
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $update_query = mysqli_query($con, "UPDATE students SET password = '$hashed_password', confirmPassword = '$hashed_password' WHERE email = '$email'");

                if($update_query){
                    echo "<script>alert('Password Updated!');</script>";
                    echo "<script>window.location.href='login.php';</script>";
                }
            } else {
                echo "<script>alert('Passwords do not match!');</script>";
            }
        } else {
            $query = mysqli_query($con, "SELECT * FROM teacher WHERE email = '$email'");

            if(mysqli_num_rows($query) > 0){
                if($password == $confirmPassword){
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                    $update_query = mysqli_query($con, "UPDATE teacher SET password = '$hashed_password', confirmPassword = '$hashed_password' WHERE email = '$email'");

                    if($update_query){
                        echo "<script>alert('Password Updated!');</script>";
                        echo "<script>window.location.href='login.php';</script>";
                    }
                } else {
                    echo "<script>alert('Passwords do not match!');</script>";
                }
            } else {
                echo "<script>alert('Email not found!');</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../../SIA/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <div class="container">
    <div class="box form-box">
        <header>Change Password</header>
        <div class="icon" >
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="50" fill="currentColor" class="bi bi-person-lock" viewBox="0 0 16 16">
        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m0 5.996V14H3s-1 0-1-1 1-4 6-4q.845.002 1.544.107a4.5 4.5 0 0 0-.803.918A11 11 0 0 0 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664zM9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1"/>
        </svg>
        </div>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="" placeholder="  Email">
                    <div id="email-error" class="error-message"></div>
                </div>

                <div class="field input">
                <label for="password">New Password:</label>
                    <input type="password" name="password" id="password" value="" placeholder="  New Password">
                    <div id="password-error" class="error-message"></div>
                </div>

                <div class="field input">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" name="confirmPassword" id="confirmPassword" value="" placeholder="  Confirm Password">
                    <div id="confirmPassword-error" class="error-message"></div>
                </div>

                <div class="field">
                <button type="submit" name="submit" class="btn2" style="color: white;">Update</button>
                </div>

                <div class="link"><a class="link-offset-2 link-dark link-underline-opacity-0" href="../../SIA/php/login.php">Back to Login</a></div>
            </form>
        </div>
    </div>

    <script>
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const emailError = document.getElementById ('email-error');
        const passwordError = document.getElementById('password-error');
        const confirmPasswordError = document.getElementById('confirmPassword-error');

        document.addEventListener('input', () => {
            if (emailInput.value.trim() !== '') {
                emailError.textContent = '';
            }

            if (passwordInput.value.trim() !== '' && passwordInput.value.length >= 8) {
                passwordError.textContent = '';
            }

            if (confirmPasswordInput.value.trim() !== '' && confirmPasswordInput.value === passwordInput.value) {
                confirmPasswordError.textContent = '';
            }
        });

        document.addEventListener('submit', (e) => {
            let isValid = true;

            if (emailInput.value.trim() === '') {
                emailError.textContent = 'Email is required';
                emailError.style.color = 'red';
                emailError.style.fontSize = '12px';
                isValid = false;
            }

            if (passwordInput.value.trim() === '' || passwordInput.value.length < 8) {
                passwordError.textContent = 'Password should be at least 8 characters long';
                passwordError.style.color = 'red';
                passwordError.style.fontSize = '12px';
                isValid = false;
            }

            if (confirmPasswordInput.value.trim() === '' || confirmPasswordInput.value !== passwordInput.value) {
                confirmPasswordError.textContent = 'Passwords do not match';
                confirmPasswordError.style.color = 'red';
                confirmPasswordError.style.fontSize = '12px';
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>