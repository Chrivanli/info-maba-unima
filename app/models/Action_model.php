<?php

class Action_model{
    private $table = 'ref_seleksi';
    private $fakultas = 'ref_fakultas';
    private $db;

	public function __construct(){
		$this->db = new Database;
	}

    public function getSeleksi(){
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }
    public function getSeleksiID($kd_seleksi){
		$this->db->query('SELECT * FROM '. $this->table .' WHERE kd_seleksi=:kd_seleksi');
		$this->db->bind('kd_seleksi', $kd_seleksi);
		return $this->db->single();
	}
    public function ubahDataSeleksi($data){
		$query = "UPDATE ".$this->table." SET jalur=:jalur, nama_seleksi=:nama_seleksi, singkatan=:singkatan
									WHERE kd_seleksi=:kd_seleksi";
		$this->db->query($query);
		$this->db->bind('kd_seleksi', $data['kd_seleksi']);
		$this->db->bind('jalur', $data['jalur']);
		$this->db->bind('nama_seleksi', $data['nama_seleksi']);
		$this->db->bind('singkatan', $data['singkatan']);
		$this->db->execute();
		return $this->db->rowCount();
	}
	public function getFakultas(){
        $this->db->query('SELECT * FROM '. $this->fakultas);
        return $this->db->resultSet();
    }
	
}