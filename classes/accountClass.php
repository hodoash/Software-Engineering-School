<?php

//connect to db
require("../settings/database_class.php");

//account class to handle bank account details

class account_class extends db_connection{



    public function add_new_account($a,$b,$c,$d,$e,$f){
        //sql statement
		$sql ="INSERT INTO `BankAccount` (`anum`, `fname`,`lname`,`amount`,`acctype`, `pphone`) VALUES
        ('$a', '$b', '$c','$d','$e','$f')";
        //execute statement
        return $this->db_query($sql);
        
    }
    public function search_for_account($sterm){
		//a query to search accounts matching term
		$sql = "SELECT * FROM BankAccount WHERE anum LIKE '%$sterm%'";

		//execute the query
		return $this->db_query($sql);
	}

    public function view_account_statement($accn){
        //query to check account  statement
        $sql = "SELECT * FROM BankAccount WHERE anum=$accn";
        //execute command
        //echo($sql);
        return $this->db_query($sql);
    }
    public function view_all_statements(){
        //query to check account  statement
        $sql = "SELECT * FROM BankAccount";
        //execute command
        //echo($sql);
        return $this->db_query($sql);
    }
    
    public function view_account_balance($accn){
        //query to check account  statement
        $sql = "SELECT amount FROM BankAccount WHERE anum=$accn";
        //execute command
        //echo($sql);return true;
        //echo($this->db_query($sql);
        return $this->db_query($sql);
    }

    public function change_account_balance($a,$b){
		$sql = "UPDATE BankAccount SET `amount`='$b' WHERE anum=$a";
        //execute the query
        return $this->db_query($sql);
    }

    public function check_for_withdraw($a,$b){
        $sql = "SELECT amount FROM BankAccount WHERE anum=$a";
        //execute it
        $dbamnt= $this->db_query($sql);
        //$dbamnt=$this->view_account_balance($a);//$this.db_query($sql);
        //echo("albett");
        echo($dbamnt);
        var_dump($dbamnt);echo("albert");return false;
        //if dbamnt>$a, thne allow it
        if ($dbamnt<=$b){
            return false;
        }
        return $this->dbamnt;
    }
    // public function transfer_amount($a,$b,$c){
    //do it in the controller instead 
    // }

    public function update_account($a,$b,$c,$d,$e){
        $sql="UPDATE BankAccount SET fname= '$b', lname='$c', acctype='$d',pphone='$e'  WHERE anum = $a";
        //execute
        echo($sql);
        return $this->db_query($sql);
    }


    public function delete_account($a){
        $sql = "DELETE from BankAccount WHERE anum=$a";
        //execute
        return $this->db->query($sql);
    }

    // public function transfer_amount($a,$b){
    //     $sql=""
    // }
}


?>