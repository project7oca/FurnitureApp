<?php 
function isLoggedIn() {
	if (isset($_SESSION['isLogin'])) {
		return true;
	}else{
		return false;
	}
}
?>