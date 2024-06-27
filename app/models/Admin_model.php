<?php
class Admin_model{

	private $jurusan 	= 'ref_jurusan';
	private $fakultas 	= 'ref_fakultas';
	private $passed = 'maba_passed';
	private $regist = 'maba_regist';
    private $db;

	public function __construct(){
		$this->db = new Database;
	}
	public function getAllPassedNow($tahun){
		$this->db->query("SELECT COUNT(*) as total FROM ".$this->passed." WHERE tahun=:tahun;");
		$this->db->bind('tahun', $tahun);
		$result = $this->db->single();
		return $result['total'];
	}
	public function getAllRegistNow($tahun){
		$this->db->query("SELECT COUNT(*) as total FROM ".$this->regist." WHERE tahun=:tahun;");
		$this->db->bind('tahun', $tahun);
		$result = $this->db->single();
		return $result['total'];
	}
	public function getAllNimNow($tahun){
		$this->db->query("SELECT COUNT(*) as total FROM ".$this->regist." WHERE tahun=:tahun AND s_nim='1';");
		$this->db->bind('tahun', $tahun);
		$result = $this->db->single();
		return $result['total'];
	}
	public function getPMB($tahun){
		$this->db->query("SELECT SUM(CASE WHEN ".$this->passed.".kd_seleksi = 'S01' THEN 1 ELSE 0 END) AS total_S01,
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
							WHERE ".$this->passed.".tahun =:tahun");
		$this->db->bind('tahun', $tahun);
		return $this->db->single();
	}
    public function getVerif($tahun){
		$this->db->query("SELECT COUNT(*) as total_verifikasi 
                            FROM ".$this->regist."
                            WHERE s_verifikasi=:verif AND tahun=:tahun");
		$this->db->bind('verif', 1);
		$this->db->bind('tahun', $tahun);
		$result = $this->db->single();
		return $result['total_verifikasi'];
	}
    public function getNim($tahun){
		$this->db->query("SELECT COUNT(*) as total_nim 
                            FROM ".$this->regist."
                            WHERE s_nim=:nim AND tahun=:tahun");
		$this->db->bind('nim', 1);
		$this->db->bind('tahun',$tahun);
		$result = $this->db->single();
		return $result['total_nim'];
	}
    public function getBayar($tahun){
		$this->db->query("SELECT COUNT(*) as total_bayar 
                            FROM ".$this->regist."
                            WHERE (s_bayar=:bayar OR s_kipk IS NOT NULL) AND tahun=:tahun");
		$this->db->bind('bayar', 1);
		$this->db->bind('tahun',$tahun);
		$result = $this->db->single();
		return $result['total_bayar'];
	}
    public function getKipk($tahun){
		$this->db->query("SELECT COUNT(*) as total_kipk 
                            FROM ".$this->regist."
                            WHERE s_kipk IS NOT NULL AND tahun=:tahun");
		$this->db->bind('tahun',$tahun);
		$result = $this->db->single();
		return $result['total_kipk'];
	}
}

