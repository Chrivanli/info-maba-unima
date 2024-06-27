<?php
class Sebaran_model{
    private $kota    = 'ref_kota';
	private $provinsi= 'ref_provinsi';
	private $passed  = 'maba_passed';
	private $regist  = 'maba_regist';
    private $db;

	public function __construct(){
		$this->db = new Database;
	}
	public function getAllProvinsi(){
		$this->db->query("SELECT id, 
								COALESCE(SUM(total), 0) AS value
						FROM ".$this->kota."
						LEFT JOIN (
							SELECT kd_kota, COUNT(".$this->regist.".no_pendaftaran) AS total
							FROM ".$this->regist."
							LEFT JOIN ".$this->passed." ON ".$this->regist.".no_pendaftaran = ".$this->passed.".no_pendaftaran
							WHERE s_nim='1'
							GROUP BY kd_kota
						) AS ".$this->passed." ON ref_kota.kd_kota = ".$this->passed.".kd_kota
						RIGHT JOIN ".$this->provinsi." ON ref_kota.kd_provinsi = ".$this->provinsi.".kd_provinsi
						GROUP BY nama_provinsi
						ORDER BY ".$this->provinsi.".kd_provinsi;");
		return $this->db->resultSet();
	}
}

