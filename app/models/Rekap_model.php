<?php
class Rekap_model{
	private $seleksi 	= 'ref_seleksi';
	private $jurusan 	= 'ref_jurusan';
	private $fakultas 	= 'ref_fakultas';
	private $kota    	= 'ref_kota';
	private $provinsi   = 'ref_provinsi';
	private $passed  	= 'maba_passed';
	private $regist  	= 'maba_regist';
    private $db;

	public function __construct(){
		$this->db = new Database;
	}
    public function getRekap($jjar, $kolom, $fakultas){
		$this->db->query("SELECT  $kolom AS kolom, 
								COALESCE(SUM(total_S01), 0) AS total_S01, 
								COALESCE(SUM(total_S02), 0) AS total_S02, 
								COALESCE(SUM(total_S03), 0) AS total_S03,

								COALESCE(SUM(total_reg_S01), 0) AS total_reg_S01, 
								COALESCE(SUM(total_reg_S02), 0) AS total_reg_S02, 
								COALESCE(SUM(total_reg_S03), 0) AS total_reg_S03,

								COALESCE(SUM(total_nim_S01), 0) AS total_nim_S01, 
								COALESCE(SUM(total_nim_S02), 0) AS total_nim_S02, 
								COALESCE(SUM(total_nim_S03), 0) AS total_nim_S03
						FROM ".$this->jurusan."
						LEFT JOIN (
							SELECT ".$this->passed.".kd_jurusan, 
								SUM(CASE WHEN ".$this->passed.".kd_seleksi = 'S01' THEN 1 ELSE 0 END) AS total_S01,
								SUM(CASE WHEN ".$this->passed.".kd_seleksi = 'S02' THEN 1 ELSE 0 END) AS total_S02,
								SUM(CASE WHEN ".$this->passed.".kd_seleksi = 'S03' THEN 1 ELSE 0 END) AS total_S03,

								SUM(CASE WHEN ".$this->passed.".kd_seleksi = 'S01' AND reg='1' THEN 1 ELSE 0 END) AS total_reg_S01,
								SUM(CASE WHEN ".$this->passed.".kd_seleksi = 'S02' AND reg='1' THEN 1 ELSE 0 END) AS total_reg_S02,
								SUM(CASE WHEN ".$this->passed.".kd_seleksi = 'S03' AND reg='1' THEN 1 ELSE 0 END) AS total_reg_S03,
								
								SUM(CASE WHEN ".$this->passed.".kd_seleksi = 'S01' AND s_nim='1' THEN 1 ELSE 0 END) AS total_nim_S01,
								SUM(CASE WHEN ".$this->passed.".kd_seleksi = 'S02' AND s_nim='1' THEN 1 ELSE 0 END) AS total_nim_S02,
								SUM(CASE WHEN ".$this->passed.".kd_seleksi = 'S03' AND s_nim='1' THEN 1 ELSE 0 END) AS total_nim_S03
							FROM ".$this->passed."
							LEFT JOIN ".$this->regist." ON ".$this->passed.".no_pendaftaran = ".$this->regist.".no_pendaftaran
							GROUP BY kd_jurusan
							) AS ".$this->passed." ON ".$this->jurusan.".kd_jurusan = ".$this->passed.".kd_jurusan
						LEFT JOIN ".$this->fakultas." ON ".$this->jurusan.".fakultas = ".$this->fakultas.".fakultas
						WHERE kd_jjar LIKE :jjar AND ".$this->jurusan.".fakultas LIKE :fakultas
						GROUP BY kolom
						ORDER BY ".$this->fakultas.".fakultas ASC;");
		$this->db->bind('jjar', '%'.$jjar.'%');
		$this->db->bind('fakultas', '%'.$fakultas.'%');
		return $this->db->resultSet();
	}
	public function getJenisKelamin($jjar, $kolom, $fakultas){
		$this->db->query("SELECT  $kolom AS kolom, 
								COALESCE(SUM(total_L), 0) AS total_L, 
								COALESCE(SUM(total_P), 0) AS total_P, 

								COALESCE(SUM(total_reg_L), 0) AS total_reg_L, 
								COALESCE(SUM(total_reg_P), 0) AS total_reg_P, 

								COALESCE(SUM(total_nim_L), 0) AS total_nim_L, 
								COALESCE(SUM(total_nim_P), 0) AS total_nim_P
						FROM ".$this->jurusan."
						LEFT JOIN (
							SELECT ".$this->passed.".kd_jurusan, 
								SUM(CASE WHEN ".$this->passed.".jenis_kelamin='L' THEN 1 ELSE 0 END) AS total_L,
								SUM(CASE WHEN ".$this->passed.".jenis_kelamin='P' THEN 1 ELSE 0 END) AS total_P,

								SUM(CASE WHEN ".$this->passed.".jenis_kelamin='L' AND reg='1' THEN 1 ELSE 0 END) AS total_reg_L,
								SUM(CASE WHEN ".$this->passed.".jenis_kelamin='P' AND reg='1' THEN 1 ELSE 0 END) AS total_reg_P,

								SUM(CASE WHEN ".$this->passed.".jenis_kelamin='L' AND s_nim='1' THEN 1 ELSE 0 END) AS total_nim_L,
								SUM(CASE WHEN ".$this->passed.".jenis_kelamin='P' AND s_nim='1' THEN 1 ELSE 0 END) AS total_nim_P
							FROM ".$this->passed."
							LEFT JOIN ".$this->regist." ON ".$this->passed.".no_pendaftaran = ".$this->regist.".no_pendaftaran
							GROUP BY kd_jurusan
							) AS ".$this->passed." ON ".$this->jurusan.".kd_jurusan = ".$this->passed.".kd_jurusan
						LEFT JOIN ".$this->fakultas." ON ".$this->jurusan.".fakultas = ".$this->fakultas.".fakultas
						WHERE kd_jjar LIKE :jjar AND ".$this->jurusan.".fakultas LIKE :fakultas
						GROUP BY kolom
						ORDER BY ".$this->fakultas.".fakultas ASC;");
		$this->db->bind('jjar', '%'.$jjar.'%');
		$this->db->bind('fakultas', '%'.$fakultas.'%');
		return $this->db->resultSet();
	}
	public function getTotal($jjar, $kolom, $fakultas){
		$this->db->query("SELECT $kolom AS kolom, 
								COALESCE(SUM(total), 0) AS total, 
								COALESCE(SUM(total_reg), 0) AS total_reg, 
								COALESCE(SUM(total_nim), 0) AS total_nim
						FROM ".$this->jurusan."
						LEFT JOIN (
							SELECT ".$this->passed.".kd_jurusan, 
								COUNT(".$this->passed.".no_pendaftaran) AS total,
								SUM(CASE WHEN reg='1' THEN 1 ELSE 0 END) AS total_reg,
								SUM(CASE WHEN s_nim='1' THEN 1 ELSE 0 END) AS total_nim
							FROM ".$this->passed."
							LEFT JOIN ".$this->regist." ON ".$this->passed.".no_pendaftaran = ".$this->regist.".no_pendaftaran
							GROUP BY kd_jurusan
							) AS ".$this->passed." ON ".$this->jurusan.".kd_jurusan = ".$this->passed.".kd_jurusan
						LEFT JOIN ".$this->fakultas." ON ".$this->jurusan.".fakultas = ".$this->fakultas.".fakultas
						WHERE kd_jjar LIKE :jjar AND ".$this->jurusan.".fakultas LIKE :fakultas
						GROUP BY kolom
						ORDER BY ".$this->fakultas.".fakultas ASC;");
		$this->db->bind('jjar', '%'.$jjar.'%');
		$this->db->bind('fakultas', '%'.$fakultas.'%');
		return $this->db->resultSet();
	}
}