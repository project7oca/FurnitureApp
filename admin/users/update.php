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
<?php



$connection = mysqli_connect("localhost","root","","project7");
if(isset($_POST['update']))
{
   $id = $_POST['edit_id'];
   $fullname =$_POST['fullname-edit'];
   $email = $_POST['email-edit'];
   $password =$_POST['password-edit'];
   $phone = $_POST['phone-edit'];
   $userRole = $_POST['userRole-edit'];
   $query = "UPDATE users SET fullname='$fullname', email='$email',phone='$phone', password='$password', userRole='$userRole' WHERE id='$id'";
   $query_run=mysqli_query($connection, $query);
    if($query_run){        
        echo'The Account Has Been Modified';
        header ('location:index.php');
}else{
    echo'notwork';
    header ('location:index.php');
}

    


}
?>