<?php
//connect to the login class
require("../classes/loginClass.php");

//function to get login information - takes account num
function get_login_fxn($a){
	//Create an array variable
	$login_array = array();

	//create an instance of the login class
	$login_object = new login_class();

	//run the verify login method using the accnt num
	$login_record = $login_object->verify_login($a);

	//check if the method worked
	if ($login_record) {
		//return $login_record;
		//fetch the from the result
		//$one_record = $login_object->db_fetch();
		//print_r($one_record);//return false;

		while ($one_record = $login_object->db_fetch()) {
			//Assign each result to the array
			$login_array[] = $one_record;
		}
		//assign to array
		//$login_array[] = $login_record;
		//var_dump($login_array);return false;
		return $login_array;
		
	}
	echo("something wnt dffd");
	//return array;
	return false;
}

//function to set login information - takes account num
function create_new_login($accn,$pass){
	//Create an array variable
	// $login_array = array();

	//create an instance of the login class
	$login_object = new login_class();

	//run the create login method using the accnt num n pass
	$login_created = $login_object->add_new_user($accn,$pass);

	//check if the method worked
	if ($login_created) {
		echo($login_created);
		//fetch the from the result
		// $one_record = $login_object->db_fetch();
		//assign to array
        // $login_array[] = $one_record;
        return $login_created;
	}else{
        return false;
    }
	//return array
	//return $login_array;
}

//delete a user function - takes the accn
function delete_user_fxn($a){
	//create an instance of the contact class
	$login_object = new login_class();

	//run the delete one contact method
	$delete_user = $login_object->delete_one_user($a);

	//check if method worked
	if ($delete_user) {
	
		//return query result (boolean)
		return $delete_user;
	}else{
		//return false
		return false;
	}
}
?>