<?php 
session_start();
session_destroy();
header('Location: http://localhost/p7/FurnitureApp/user-login');
exit;
?>