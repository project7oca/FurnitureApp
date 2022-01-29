<?php

$connection = mysqli_connect("localhost","root","","project7");
if(isset($_POST['edit'])){
$id=$_POST['edit'];
$query="SELECT * FROM users WHERE id='$id'";
$query_run= mysqli_query($connection, $query); 
foreach($query_run as $row)
{
    ?>
  
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
  </div>
  <div class="card-body">
<form action="test2.php" method='post'>
<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>" >
  <div class="form-group">
        <label> name </label>
         <input type="text" name="fullname-edit" class="form-control" value=<?php echo $row['fullname']?>  placeholder="fullname">
    </div>
    <div class="form-group">
        <label> email </label>
         <input type="text" name="email-edit" class="form-control" value=<?php echo $row['email']?> placeholder="email ">
    </div>
    <div class="form-group">
        <label> phone </label>
         <input type="text" name="phone-edit" class="phone-control" value=<?php echo $row['phone']?> placeholder="phone">
    </div>
    <div class="form-group">
        <label> password </label>
         <input type="text" name="password-edit" class="form-control" value=<?php echo $row['password']?>  placeholder="password">
    </div>
    <div class="form-group">
        <label> userRole </label>
         <input type="text" name="userRole-edit" class="userRole-control" value=<?php echo $row['userRole']?> placeholder="description">
    </div>
    
    <button ><a href="tableuser.php" class="btn btn-danger" > CANCEL  </a></button>
<button name='update' class="btn btn-primary"> Update </button>
</form>                                   
    <?php 
}
}
?> 
  </div>
</div>