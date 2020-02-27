<?php

//for header redirection
ob_start();

//start session - needed to capture login information 
session_start(); 

//connnect to the controller
require("../controllers/accountcontroller.php");


//check if signup button was clicked 
if (isset($_POST['submitTrans'])) {
	
    //grab form details 
    //$a=$POST['uid'];
    $isTrans=1;
   
    $amountTrans = $_POST['dep_amnt'];
    $accnt_rec = $_POST['acct_rece'];
    
    //deduct from account
    $deposit_fun=change_amount_fnx($_SESSION["account_num"],$amountTrans,0);
    //credit into another accnt
    $trans_fun=transfer_amount_fxn($accnt_rec,$amountTrans);
    //echo($deposit_fun);return true;

    if($deposit_fun==1 && $trans_fun==1){
        $message3 = "Your transaction has been completed successfully";
        echo "<script type='text/javascript'>alert('$message3');</script>";
        

           
    }
    else{
            $message3 = "Your transaction has not been  successful. Contact customer service";
            echo "<script type='text/javascript'>alert('$message3');</script>";
        }
	
}
elseif(isset($_POST['submitDraw'])){
    //grab form details 
    //$a=$POST['uid'];
    $isDeposit=0;
   
    $amountDep = $_POST['withdraw_amnt'];
    
    $deposit_fun=change_amount_fnx($_SESSION["account_num"],$amountDep,$isDeposit);

    if($deposit_fun){
        $message3 = "Your transaction has been completed successfully";
        echo "<script type='text/javascript'>alert('$message3');</script>";
    }
    else{
        $message3 = "Your transaction has not been  successful. Contact customer service";
        echo "<script type='text/javascript'>alert('$message3');</script>";
    }
    //redirection to home page
    // header('Location: main.php');


}
    //redirection to home page
    //header('Location: main.php');
   
    

?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    </head>

    <body>
        <div id="middle"  style="text-align: center;
    height: 50vh;">
            <div  class=" d-flex justify-content-center align-content-center align-middle">
                
            </div>
        </div>
        <p class="text-center" style="font-size: 50px"><a href="main.php">Go Back To Home Page</a></p>
    </body>
</html>