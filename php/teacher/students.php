<?php
    session_start();
    include('../../php/db_config.php');

    if(!isset($_SESSION['valid'])){
      header("Location: ../../index.php");
     }

    $query = mysqli_query($con, "SELECT * FROM students");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>

<style>
        .offcanvas {
            width: 300px !important;
        }

        .navbar {
            background-color: #f8f9fa;
        }

        .offcanvas-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .offcanvas-body {
            padding: 1rem;
        }

        .btn-outline-success {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .btn-outline-success:hover {
            background-color:#0056b3;
            border-color: #0056b3;
        }

        .offcanvas .nav-item {
            margin-bottom: 10px;
        }

        .offcanvas .nav-item a {
            color: #333;
            font-size: 16px;
        }

        .logout-link {
        color: red; 
        }
    
        .logout-link:hover {
        color: darkred; 
        }

        .offcanvas .nav-item a:hover {
            color: #0056b3;
            text-decoration: none;
        }
        
        .navbar-brand img {
            width: 150px;
        }

        .offcanvas-header h5 {
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .navbar-toggler {
                position: absolute;
                right: 20px; 
                top: 5px;
            }
        }
        .hs-title{
          font: 44px rubik, sans-serif;
          margin: 100px 0px 0px;
          font-weight: bold;
        }

        .hs-des{
          font: 24px rubik, sans-serif;
          margin: 10px 0px 16px;
        }
    </style>
<body>
  <!-- HEADER -->
  <header>
    <nav class="navbar navbar-light fixed-top">
        <div class="container">
          <a class="navbar-brand"><img src="../../img/logo.png" alt="Readiculous" width=""></a>
          <form class="d-flex">
           
          </form>
          <button type="button" class="btn btn-secondary" onclick="location.href='dashboard.php'">Back</button>
          </div>
      </nav>
  </header>

  <main style="margin-top: 50px;">
    <section>
      <div class="container justify-content-center align-items-center ">
        <div class="row">
          <div class="col-md-12">
            <h1>List of Students who Register</h1>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Email Address</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
    <?php
    while($result = mysqli_fetch_assoc($query)){
        echo '<tr>';
        echo '<td>'.$result['id'].'</td>';
        echo '<td>'.$result['fName'].' '.$result['lName'].'</td>';
        echo '<td>'.$result['email'].'</td>';
        echo '<td>
                <a href="student_activity_logs.php?id='.$result['id'].'" class="btn btn-primary">View Activity Logs</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal'.$result['id'].'">Delete Account</button>
              </td>';
        echo '</tr>';
        ?>
        <!-- Delete Confirmation -->
<div class="modal fade" id="deleteModal<?php echo $result['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this student's account?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="../../php/delete_student_teacher.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                    <input type="hidden" name="role" value="student">
                    <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
            <?php
        }
        ?>
    </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>

  
        <script src="../../js/bootstrap.bundle.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</body>
</html>