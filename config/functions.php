<?php 

function isLoggedIn() {
	if (isset($_SESSION['isLogin'])) {
		return true;
	}else{
		return false;
	}
}



function isAdmin() {
	if(isset($_SESSION['userRole'])) {
		return true;
	} else {
		return false;
	}
}
?>