<?php
    session_start();
    include('db_config.php');

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $role = $_POST['role'];

        //DELETE STUDENT OR TEACHER ACCOUNT
        if($role == 'student'){
            $delete_query = mysqli_query($con, "DELETE FROM students WHERE id = '$id'") or die("error occurred");
            $redirect_url = '/SIA/php/teacher/students.php';
        } else if($role == 'teacher'){
            $delete_query = mysqli_query($con, "DELETE FROM teacher WHERE id = '$id'") or die("error occurred");
            $redirect_url = '/SIA/php/teacher/teachers.php';
        }

        if($delete_query){
            echo "<script>alert('Account deleted!');</script>";
            echo "<script>window.location.href='$redirect_url';</script>";
        } else {
            echo "<script>alert('Error deleting account!');</script>";
            echo "<script>window.location.href='$redirect_url';</script>";
        }
    }
?>