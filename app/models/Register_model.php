<?php

class Register_model{
    private $table = 'users';
    private $db;

	public function __construct(){
		$this->db = new Database;
	}
	public function check_user($username,$email)
	{
		$this->db->query('SELECT * FROM '. $this->table .' WHERE username =:username OR email =:email');
		$this->db->bind('username', $username);
		$this->db->bind('email', $email);
        $this->db->execute();
		return $this->db->rowCount();
	}
    public function insertUser($username,$email,$hashed){
        $query = "INSERT INTO ".$this->table." VALUES ( ' ',:username,:hashed,:email,NOW(),NOW())";
        $this->db->query($query);
		$this->db->bind('username', $username);
		$this->db->bind('hashed', $hashed);
		$this->db->bind('email', $email);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

