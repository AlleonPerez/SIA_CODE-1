<?php
    include('../php/db_config.php');
    session_start();

    if(!isset($_SESSION['valid'])){
        header("Location: login.php");
    }

    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $role = $_SESSION['role'];

        if($role == 'student'){
            $query = mysqli_query($con,"SELECT * FROM students WHERE id = '$id'");
        } else if($role == 'teacher'){
            $query = mysqli_query($con,"SELECT * FROM teacher WHERE id = '$id'");
        }

        while($result = mysqli_fetch_assoc($query)){
            $res_fName = $result['fName'];
            $res_lName = $result['lName'];
            $res_email = $result['email'];
        }
    } else {
        echo "Error: ID is not set or empty.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../../SIA/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <div class="container">
    <div class="box form-box">     
        <header>Edit Profile</header>
        <div class="icon" >
            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
        </div>
            <form action="" method="post">
                <div class="field input">
                    <label>First Name:</label>
                    <input type="text" name="fName" value="<?php echo $res_fName; ?>" placeholder="First Name">
                </div>

                <div class="field input">
                    <label>Last Name:</label>
                    <input type="text" name="lName" value="<?php echo $res_lName; ?>" placeholder="Last Name">
                </div>

                <div class="field input">
                    <label>Email Address:</label>
                    <input type="email" name="email" value="<?php echo $res_email; ?>" placeholder="Email Address">
                </div>

                <div class="field">
                    <button type="submit" name="submit" class="btn2 btn-outline-dark" style="color: white;">Update</button>
                </div>
            </form>

            <div class="link"><a class="link-offset-2 link-dark link-underline-opacity-0" href="profile.php">Back to Profile</a></div>
        </div>
    </div>

    <?php
    if(isset($_POST['submit'])){
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email = $_POST['email'];

        if($role == 'student'){
            $update_query = mysqli_query($con, "UPDATE students SET fName = '$fName', lName = '$lName', email = '$email' WHERE id = '$id'");
        } else if($role == 'teacher'){
            $update_query = mysqli_query($con, "UPDATE teacher SET fName = '$fName', lName = '$lName', email = '$email' WHERE id = '$id'");
        }

        if($update_query){
            echo "<script>alert('Profile Updated!');</script>";
            echo "<script>window.location.href='profile.php';</script>";
        } else {
            echo "<script>alert('Error updating profile!');</script>";
            echo "<script>window.location.href='edit.php';</script>";
        }
    }
?>
</body>
</html>