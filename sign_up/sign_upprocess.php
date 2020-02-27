<?php
//for header redirection
ob_start();

//start session - needed to capture login information 
session_start(); 

//connnect to the controller
require("../controllers/logincontroller.php");


//check if signup button was clicked 
if (isset($_POST['usign_up'])) {
	
	//grab form details 
	$laccn = $_POST['accn'];
    $lpass = $_POST['upass'];
    $lpass_c = $_POST['upass_c'];
    

    if($lpass==$lpass_c){
        //check if signup is true
        $lpass_hash=sha1($lpass);
        $check_signup = create_new_login($laccn,$lpass_hash);
        
        //check if  it was successful
        if($check_signup){
            //redirection to login page
				header('Location: ../login/login.php');
				//to make sure the code below does not execute after redirection
				exit;
        }
    }else{
        echo("unsucessfull sign up");
        header('Location: sign_up.php');
    }
	
}

?>