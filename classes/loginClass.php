<?php
//connect to database class
require("../settings/database_class.php");

/**
*Login class to handle everything login related
*/


class login_class extends db_connection
{
	
	public function verify_login($a){
		//a query to get all login information base on account number
		$sql = "SELECT * FROM ulogin WHERE anum=$a";
		echo($sql);
		//return false;
		//execute the query
		return $this->db_query($sql);
    }
    
    public function add_new_user($a,$b){
        //sql statement
		$sql ="INSERT INTO `ulogin` (`anum`, `upass`) VALUES
        ('$a', '$b')";
        //execute statement
        return $this->db_query($sql);
        
    }

    public function delete_one_user($a){
		//a query to delete contact using an id
		$sql = "DELETE from ulogin WHERE anum=$a";
		
		//execute the query
		return $this->db_query($sql);
	}


}

?>