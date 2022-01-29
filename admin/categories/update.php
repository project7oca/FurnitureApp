<?php



$connection = mysqli_connect("localhost","root","","project7");
if(isset($_POST['update']))
{
   $id = $_POST['edit_id'];
   $category_name =$_POST['category_name-edit'];
   
   $query = "UPDATE categories SET category_name='$category_name' WHERE id='$id'";
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