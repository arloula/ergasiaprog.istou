<?php

session_start();

if (isset($_POST['submit'])){
	
	include 'dbh.inc.php';
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);	
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	//erros handlers
	//check if inputs are empty
	if(empty($uid) || empty($pwd)) {
		header("Location: ../loginindex.php?login=empty");
		exit();
	}else {
		$sql = "SELECT * FROM user WHERE username='$uid' OR email='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1) {
			header("Location: ../loginindex.php?login=error");
			exit();
		} else{
			if($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdChech = password_verify($pwd, $row['password']);
				if($hashedPwdChech == false) {
					header("Location: ../loginindex.php?login=error");
					exit();
				}	elseif ($hashedPwdChech == true) {
					//log in the user here
					$_SESSION['u_id'] = $row['id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['email'];
					$_SESSION['u_uid'] = $row['username'];
					header("Location: ../loginindex.php?login=success");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../loginindex.php?login=error");
	exit();
}