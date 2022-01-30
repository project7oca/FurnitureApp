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
<!-- Fontfaces CSS-->
<link href="css/font-face.css" rel="stylesheet" media="all">
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
<link href="css/theme.css" rel="stylesheet" media="all">

<!-- USER DATA-->
<div class="user-data m-b-30">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Example Form</div>
            <div class="card-body card-block">
                <form action="" method="post" class="">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Full name:</div>
                            <input type="text" id="fullname" name="fullname" class="form-control">
                            <div class="input-group-addon">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Email:</div>
                            <input type="email" id="email" name="email" class="form-control">
                            <div class="input-group-addon">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Phone:</div>
                            <input type="tel" id="phone" name="phone" class="form-control">
                            <div class="input-group-addon">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Password:</div>
                            <input type="password" id="password" name="password" class="form-control">
                            <div class="input-group-addon">
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group-addon">userRole:</div>
                        <input type="number" id="userRole" name="userRole" class="form-control">
                        <div class="input-group-addon">
                        </div>
                    </div>
            </div>
            <div class="form-actions form-group">
                <button type="submit" value="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
$servername = "localhost";
$dbname = "project7";
$nameSql = "root";
$passSql = "";

// $conn = mysqli_connect($server, $username, $password, $dbname) ;
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $nameSql, $passSql);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_POST['email'])) {
    if (!empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password'] && !strlen($_POST['userRole']) == 0)) {

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $userRole = $_POST['userRole'];
        $query = "INSERT INTO users(`fullname`,`email`,`phone`,`password`,`userRole`) VALUES ('$fullname','$email','$phone','$password', $userRole)";
        $conn->exec($query);

        echo 'good';

        echo "<script>
                window.location.href = 'index.php';
            </script>";
    }
}
// echo  '<button><a href="index.php">back</button>';
?>
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