<?php

class Seleksi_kode{
    private $table = 'ref_seleksi';
    private $db;

	public function __construct(){
		$this->db = new Database;
	}

    public function getKodeSeleksi($seleksi){
        $this->db->query('SELECT * FROM '. $this->table.' WHERE kd_seleksi LIKE :seleksi');
		$this->db->bind('seleksi', '%'.$seleksi.'%');
        $result = $this->db->single();
        return $result['singkatan'];
    }
    public function getNamaSeleksi($seleksi){
        $this->db->query('SELECT * FROM '. $this->table.' WHERE kd_seleksi LIKE :seleksi');
		$this->db->bind('seleksi', '%'.$seleksi.'%');
        $result = $this->db->single();
        return $result['nama_seleksi'];
    }
    public function getAllSeleksi(){
        $this->db->query('SELECT * FROM '. $this->table);
        return  $this->db->resultSet();
    }
    
}

