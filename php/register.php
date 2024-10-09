<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="container">
        <div class="box form-box">


        <?php
                include("../php/db_config.php");
                if (isset($_POST['submit'])) {
                    $fname = $_POST['fName'];
                    $lname = $_POST['lName'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $confirmpassword = $_POST['confirmPassword'];
                    $role = $_POST['role'];

                    // Check if email is already in use
                    $query = mysqli_query($con, "SELECT * FROM students WHERE email = '$email'");
                    $query2 = mysqli_query($con, "SELECT * FROM teacher WHERE email = '$email'");

                    if(mysqli_num_rows($query) > 0 || mysqli_num_rows($query2) > 0){
                        echo "<div class= 'message'>
                        <p> Email is already in use!</p> </div> <br>";
                        echo "<a href= 'javascript:self.history.back()'><button class='btn btn-outline-dark' style='color: white;'>Go back</button>";
                    } else {
                        if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
                            echo "<div class= 'message'>
                            <p> Invalid email address!</p> </div> <br>";
                            echo "<a href= 'javascript:self.history.back()'><button class='btn btn-outline-dark' style='color: white;'>Go back</button>";

                        } else {

                            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                            // CREATE ACCOUNT SQL STATEMENT
                            if($role == 'student'){
                                $query = "INSERT INTO students (fName, lName, email, password, confirmPassword) VALUES ('$fname', '$lname', '$email', '$hashed_password', '$hashed_password')";
                                mysqli_query($con, $query) or die("Error");
                            } else if($role == 'teacher'){
                                $query = "INSERT INTO teacher (fName, lName, email, password, confirmPassword) VALUES ('$fname', '$lname', '$email', '$hashed_password', '$hashed_password')";
                                mysqli_query($con, $query) or die("Error");
                            }
                            
                            echo "<div class= 'message'>
                            <p> Registration Successfully!</p> </div> <br>";
                            echo "<a href='login.php'><button class='btn btn-outline-dark' style='color: white;'>Login Now</button>";
                        }
                    }
                }else{
            ?>


            <header>Register</header>
            <form action="" method="post">
                <div class="field input">
                    <input type="text" name="fName" id="fName" placeholder="  First Name">
                    <div id="fName-error" class="error-message"></div>
                </div>

                <div class="field input">
                    <input type="text" name="lName" id="lName" placeholder="  Last Name">
                    <div id="lName-error" class="error-message"></div>
                </div>

                <div class="field input">
                    <input type="text" name="email" id="email" placeholder="  Email Address">
                    <div id="email-error" class="error-message"></div>
                </div>

                <div class="field input">
                    <input type="password" name="password" id="password" placeholder="  Password">
                    <div id="password-error" class="error-message"></div>
                </div>

                <div class="field input">
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="  Confirm Password">
                    <div id="confirmPassword-error" class="error-message"></div>
                </div>

                <div class="role-selection">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="student" value="student" checked>
                    <label class="form-check-label" for="student">Student</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="teacher" value="teacher">
                    <label class="form-check-label" for="teacher">Teacher</label>
                </div>
            </div>

                <div class="field">
                <button type="submit" name="submit" class="btn btn-outline-dark" style="color: white;">Create Account</button>
                </div>

                <div class="link">Already have an account? <a href="login.php">Login</a></div>
            </form>
        </div>
      <?php } ?>
    </div>

    <script>
        const fNameInput = document.getElementById('fName');
        const lNameInput = document.getElementById('lName');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const fNameError = document.getElementById('fName-error');
        const lNameError = document.getElementById('lName-error');
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');
        const confirmPasswordError = document.getElementById('confirmPassword-error');

        document.addEventListener('input', () => {
            if (fNameInput.value.trim() !== '') {
                fNameError.textContent = '';
            }

            if (lNameInput.value.trim() !== '') {
                lNameError.textContent = '';
            }

            if (emailInput.value.trim() !== '') {
                const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (emailRegex.test(emailInput.value)) {
                    emailError.textContent = '';
                } else {
                    emailError.textContent = 'Invalid email address';
                    emailError.style.color = 'red';
                    emailError.style.fontSize = '12px';
                }
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

            if (fNameInput.value.trim() === '') {
                fNameError.textContent = 'First name is required';
                fNameError.style.color = 'red';
                fNameError.style.fontSize = '12px';
                isValid = false;
            }

            if (lNameInput.value.trim() === '') {
                lNameError.textContent = 'Last name is required';
                lNameError.style.color = 'red';
                lNameError.style.fontSize = '12px';
                isValid = false;
            }

            if (emailInput.value.trim() === '') {
                emailError.textContent = 'Email is required';
                emailError.style.color = 'red';
                emailError.style.fontSize = '12px';
                isValid = false;
            } else {
                const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (!emailRegex.test(emailInput.value)) {
                    emailError.textContent = 'Invalid email address';
                    emailError.style.color = 'red';
                    emailError.style.fontSize = '12px';
                    isValid = false;
                }
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