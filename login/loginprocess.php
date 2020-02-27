<?php
//for header redirection
ob_start();

//start session - needed to capture login information 
session_start(); 

//connnect to the controller
require("../controllers/logincontroller.php");


//check if login button was clicked 
if (isset($_POST['ulogin'])) {
	
	//grab form details 
	$laccn = $_POST['accn'];
    $lpass = $_POST['upass'];
	$lpass_h=sha1($lpass);
	if($laccn=="9999"&& $lpass=="admin"){

		//$_SESSION["user_id"] = $laccn;//$check_login[0]['uid'];
		//$_SESSION["user_role"] = $check_login[0]['an'];
		$_SESSION["account_num"] = $laccn;//$check_login[0]['anum'];

				//redirection to home page
				header('Location: ../view/mainForAdmin.php');
	}

    //check if email exist
    $check_login = get_login_fxn($laccn);
   // var_dump($check_login);
    //var_dump($check_login[0]['upass']);

	if ($check_login) {
		//accnt num exist, continue to password
        //get password from database
        //echo($check_login[2]['upass']);return false;

		$hash = $check_login[0]['upass'];
		//var_dump($hash);
		//var_dump($lpass_h);

		//verify password
		if ($hash==$lpass_h)//(password_verify($lpass_h, $hash)) 
		{
				//set session
				$_SESSION["user_id"] = $check_login[0]['uid'];
				//$_SESSION["user_role"] = $check_login[0]['an'];
				$_SESSION["account_num"] = $check_login[0]['anum'];

				//redirection to home page
				header('Location: ../view/main.php');
				//to make sure the code below does not execute after redirection
				exit;
		} else 
		{
				//echo appropriate error
			    echo 'incorrect username or password ';//return false;
		}

	} else{
		//echo appropriate error
		echo "incorrect username or password number 2";//return false;
	}
}

?>