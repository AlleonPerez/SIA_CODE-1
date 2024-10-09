<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="container">
        <div class="box form-box">

        <?php
              include("../php/db_config.php");
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);
                $role = mysqli_real_escape_string($con,$_POST['role']);


                // FETCH THE STUDENT OR TEACHER WHO REGISTERS
                if($role == 'student'){
                    $query = mysqli_query($con, "SELECT * FROM students WHERE email = '$email'");
                    $row = mysqli_fetch_assoc($query);
                    if ($row !== null) {
                        if (password_verify($password, $row['password'])) {
                            $_SESSION['valid'] = $row['email'];
                            $_SESSION['fName'] = $row['fName'];
                            $_SESSION['lName'] = $row['lName'];
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['role'] = 'student';
                            header("Location: ../php/student/home.php");
                        } else {
                            echo "<div class= 'message'>
                            <p> Wrong Username or Password!</p> </div> <br>";
                            echo "<a href= 'javascript:self.history.back()'><button class='btn btn-outline-dark' style='color: white;'>Go back</button>";
                        }
                    } else {
                        echo "<div class= 'message'>
                        <p> Account not found!</p> </div> <br>";
                        echo "<a href= 'javascript:self.history.back()'><button class='btn btn-outline-dark' style='color: white;'>Go back</button>";
                    }
                } else if($role == 'teacher'){
                    $query = mysqli_query($con, "SELECT * FROM teacher WHERE email = '$email'");
                    $row = mysqli_fetch_assoc($query);
                    if ($row !== null) {
                        if (password_verify($password, $row['password'])) {
                            $_SESSION['valid'] = $row['email'];
                            $_SESSION['fName'] = $row['fName'];
                            $_SESSION['lName'] = $row['lName'];
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['role'] = 'teacher';
                            header("Location: ../php/teacher/homeAdmin.php");
                        } else {
                            echo "<div class= 'message'>
                            <p> Wrong Username or Password!</p> </div> <br>";
                            echo "<a href= 'javascript:self.history.back()'><button class='btn btn-outline-dark' style='color: white;'>Go back</button>";
                        }
                    } else {
                        echo "<div class= 'message'>
                        <p> Account not found!</p> </div> <br>";
                        echo "<a href= 'javascript:self.history.back()'><button class='btn btn-outline-dark' style='color: white;'>Go back</button>";
                    }
                }
              }else{


            ?>
            <header>Login</header>
            <form action="" method="post" id="login-form">
                <div class="field input">
                    <input type="text" name="email" id="email" placeholder="  Email Address" >
                    <div id="email-error" class="error-message"></div>
                </div>

                <div class="field input">
                    <input type="password" name="password" id="password" placeholder="  Password" >
                    <div id="password-error" class="error-message"></div>
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
                    <button type="submit" name="submit" class="btn btn-outline-dark" style="color: white;">Login</button>
                </div>

                <div class="text-center" style="height:10px;" >OR</div>
              
              <div class="field">
                  <button class="btn btn-outline-dark" style="color: white;" onclick="window.location.href='register.php';">Create Account</button>
              </div>

              <div class="link"><a class="link-offset-2 link-dark link-underline-opacity-0" href="forgot.php">Forgot Password?</a></div>
          </form>
      </div>
    <?php } ?>
  </div>

  <script>
          const emailInput = document.getElementById('email');
          const passwordInput = document.getElementById('password');
          const emailError = document.getElementById ('email-error');
          const passwordError = document.getElementById('password-error');

          document.addEventListener('input', () => {
              if (emailInput.value.trim() !== '') {
                  emailError.textContent = '';
              }

              if (passwordInput.value.trim() !== '' && passwordInput.value.length >= 8) {
                  passwordError.textContent = '';
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

              if (!isValid) {
                  e.preventDefault();
              }
          });
  </script>

        <script src="../js/bootstrap.bundle.min.js" ></script>
        <script src="../js/bootstrap.min.js"></script>
</body>
</html>