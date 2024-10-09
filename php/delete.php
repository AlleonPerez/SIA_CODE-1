<?php
    session_start();
    include("db_config.php");

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $role = $_SESSION['role'];

        //DELETE ACCOUNT PERMANENTLY
        if($role == 'student'){
            $delete_query = mysqli_query($con, "DELETE FROM students WHERE id = '$id'") or die("error occurred");
        } else if($role == 'teacher'){
            $delete_query = mysqli_query($con, "DELETE FROM teacher WHERE id = '$id'") or die("error occurred");
        }

        if($delete_query){
            session_destroy();
            echo "<script>alert('Account Deleted!');</script>";
            echo "<script>window.location.href='../index.html';</script>";
        } else {
            echo "<script>alert('Error deleting account!');</script>";
            echo "<script>window.location.href='../php/profile.php';</script>";
        }
    }
?>