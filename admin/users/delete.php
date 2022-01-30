<?php
session_start();

include('../../config/functions.php');
if (!isLoggedIn()) {
    header('location: ../index.php');
}
if (!isAdmin()) {
  header('location: ../index.php');
}
?>
     <!-- Required meta tags-->
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="au theme template">
     <meta name="author" content="Hau Nguyen">
     <meta name="keywords" content="au theme template">

     <!-- Title Page-->
     <title>Tables</title>

     <!-- Fontfaces CSS-->
     <link href="../css/font-face.css" rel="stylesheet" media="all">
     <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
     <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
     <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

     <!-- Bootstrap CSS-->
     <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

     <!-- Vendor CSS-->
     <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
     <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
     <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
     <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
     <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
     <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
     <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

     <!-- Main CSS-->
     <link href="../css/theme.css" rel="stylesheet" media="all">



     <?php

      $connection = mysqli_connect("localhost", "root", "", "project7");
      if (isset($_POST['edit'])) {
        $id = $_POST['edit'];
        $query = "SELECT * FROM users WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);
        foreach ($query_run as $row) {
      ?>

         <!-- DataTales Example -->
         <div class="card shadow mb-4">
           <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
           </div>
           <div class="card-body">
             <form action="update.php" method='post'>
               <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
               <div class="form-group">
                 <label> name </label>
                 <input type="text" name="fullname-edit" class="form-control" value=<?php echo $row['fullname'] ?> placeholder="fullname" required>
               </div>
               <div class="form-group">
                 <label> email </label>
                 <input type="text" name="email-edit" class="form-control" value=<?php echo $row['email'] ?> placeholder="email " required>
               </div>
               <div class="form-group">
                 <label> phone </label>
                 <input type="text" name="phone-edit" class="form-control" value=<?php echo $row['phone'] ?> placeholder="phone" required>
               </div>
               <div class="form-group">
                 <label> password </label>
                 <input type="text" name="password-edit" class="form-control" value=<?php echo $row['password'] ?> placeholder="password" required>
               </div>
               <div class="form-group">
                 <label> userRole </label>
                 <input type="text" name="userRole-edit" class="form-control" value=<?php echo $row['userRole'] ?> placeholder="description" required>
               </div>

               <button><a href="index.php" class="btn btn-danger"> CANCEL </a></button>
               <button name='update' class="btn btn-primary"> Update </button>
             </form>
         <?php
        }
      }
          ?>
           </div>
         </div>
         <!-- 
         <div class="card">
           <div class="card-header">
             <strong>Inline</strong> Form
           </div>
           <div class="card-body card-block">
             <form action="" method="post" class="form-inline">
               <div class="form-group">
                 <label for="exampleInputName2" class="pr-1  form-control-label">Name</label>
                 <input type="text" id="exampleInputName2" placeholder="Jane Doe" required="" class="form-control">
               </div>
               <div class="form-group">
                 <label for="exampleInputEmail2" class="px-1  form-control-label">Email</label>
                 <input type="email" id="exampleInputEmail2" placeholder="jane.doe@example.com" required="" class="form-control">
               </div>
             </form>
           </div>
           <div class="card-footer">
             <button type="submit" class="btn btn-primary btn-sm">
               <i class="fa fa-dot-circle-o"></i> Submit
             </button>
             <button type="reset" class="btn btn-danger btn-sm">
               <i class="fa fa-ban"></i> Reset
             </button>
           </div>
         </div> -->
         <!-- Jquery JS-->
         <script src="../vendor/jquery-3.2.1.min.js"></script>
         <!-- Bootstrap JS-->
         <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
         <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
         <!-- Vendor JS       -->
         <script src="../vendor/slick/slick.min.js">
         </script>
         <script src="../vendor/wow/wow.min.js"></script>
         <script src="../vendor/animsition/animsition.min.js"></script>
         <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
         </script>
         <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
         <script src="../vendor/counter-up/jquery.counterup.min.js">
         </script>
         <script src="../vendor/circle-progress/circle-progress.min.js"></script>
         <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
         <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
         <script src="../vendor/select2/select2.min.js">
         </script>

         <!-- Main JS-->
         <script src="../js/main.js"></script>

         <script type="text/javascript">
           (function() {
             window['__CF$cv$params'] = {
               r: '6d5433f31bc75b80',
               m: 'gv7H83Is4o6s8VNM6bqZnmA010KLqb4m8li2xnRd6n0-1643477578-0-Ac9gKmPCbCdl+MP0X9O2Z1ZwwEnYY0m9PzNaS4ndVS3GczSN3ouOYu92xM3rVC79uhk4dzLRcUSuwj3y0ulcXSYExXsfV3PKUOingfMAsyfqTEnJ1o6pvlezZBJYCC87Nx/j/2WkNz7u4GJom/gRcgWczHzriYPofBPQexf5xA16xa0dGEs2LOOIRVl37clACQ==',
               s: [0x196ccbd686, 0xb55c502a9c],
             }
           })();
         </script>
         </body>

         </html>