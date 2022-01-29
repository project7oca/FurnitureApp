     <!-- Required meta tags-->
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Tables</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

  <!-- DATA TABLE -->
  <h3 class="title-7 m-b-35">data table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                           
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                         
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <a href="form.php">add item</a>
                                            <i class="zmdi zmdi-plus" > </i></button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                   <!-- DataTales Example -->
                    <div class="table-responsive">
                    <?php
    $connection = mysqli_connect("localhost","root","","project7");
    $query ="SELECT * FROM users";
   $query_run = mysqli_query($connection, $query);
   ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <thead>
    <tr>
      <th> ID </th>
       <th> fullname </th>
       <th> email </th>
       <th> phone </th>
       <th> password </th>
       <th> userRole </th>
      <th>EDIT </th>
      <th>DELETE </th>
    </tr>
   </thead>
   <tbody>
   <?php

if(mysqli_num_rows ($query_run) > 0)
    while($row =mysqli_fetch_assoc($query_run))
    {
       ?>
  <tr>
    <td><?php echo $row['id']; ?> </td>
    <td><?php echo $row['fullname']; ?> </td>
    <td><?php echo $row['email']; ?> </td>
    <td><?php echo $row['phone']; ?> </td>
    <td><?php echo $row['password']; ?> </td>
    <td><?php echo $row['userRole']; ?> </td>
    <td>
        <form action="edituser.php" method="POST" >
    <input type="hidden" name="edit" value="<?php echo $row['id'];?>">
    <button type="submit" class="btn btn-success"> EDIT</button>
    </form>
</td>
<td>
<form action="tableuser.php" method="POST" >
    <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
    <button type="submit" name="delete_btn"class=" btn btn-success"> Delete</button>
    </form>
</td>
  </tr>
  <?php
    }
else{
    echo "No Record Found";
}
?>
<?php
if(isset($_POST['delete_btn']))
{
   
    $id=$_POST['delete_id'];
    $query="DELETE FROM users WHERE id =$id";
    $query_run=mysqli_query($connection,$query);
    if($query_run)
    {
          echo"worked you delete account $fullname
           <button><a href='tableuser.php'> back to tables</button";
        }
        else
        {
            ('location:tableuser.php');
        }
    }
    
?>

                                <!-- END DATA TABLE -->
                                  <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>