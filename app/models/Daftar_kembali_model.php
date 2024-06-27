<?php
class Daftar_kembali_model{
    
	private $seleksi	= 'ref_seleksi';
	private $jurusan	= 'ref_jurusan';
	private $fakultas	= 'ref_fakultas';
	private $kota 		= 'ref_kota';
	private $provinsi 	= 'ref_provinsi';
	private $regist 	= 'maba_regist';
	private $passed 	= 'maba_passed';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}
	public function getLastYear(){
		$this->db->query("SELECT MAX(tahun) AS lastYear FROM ".$this->regist);
		$result = $this->db->single();
		return $result['lastYear'];
	}
	public function getYear(){
		$this->db->query("SELECT tahun FROM ".$this->regist." GROUP BY tahun ORDER BY tahun DESC");
		return $this->db->resultSet();
	}
	public function getMhsLast($tahun){
		$this->db->query("SELECT singkatan, IFNULL(total, 0) as total 
						FROM ".$this->seleksi."
						LEFT JOIN (
							SELECT kd_seleksi , COUNT(*) as total
							FROM ".$this->regist."
							WHERE tahun =:tahun
							GROUP BY kd_seleksi
							) AS ".$this->regist." ON ".$this->seleksi.".kd_seleksi = ".$this->regist.".kd_seleksi
						GROUP BY singkatan
						ORDER BY ".$this->seleksi.".kd_seleksi ASC");
		$this->db->bind('tahun', $tahun);
		return $this->db->resultSet();
	}
	public function getMhs($tahun, $jjar, $kolom, $fakultas){
		$this->db->query("SELECT $kolom AS kolom, 
								COALESCE(SUM(total_S01), 0) AS total_S01, 
								COALESCE(SUM(total_S02), 0) AS total_S02, 
								COALESCE(SUM(total_S03), 0) AS total_S03
						FROM ".$this->jurusan."
						LEFT JOIN (
							SELECT kd_jurusan, 
								SUM(CASE WHEN kd_seleksi = 'S01' THEN 1 ELSE 0 END) AS total_S01,
								SUM(CASE WHEN kd_seleksi = 'S02' THEN 1 ELSE 0 END) AS total_S02,
								SUM(CASE WHEN kd_seleksi = 'S03' THEN 1 ELSE 0 END) AS total_S03 
							FROM ".$this->regist."
							WHERE tahun =:tahun
							GROUP BY kd_jurusan
							) AS ".$this->regist." ON ".$this->jurusan.".kd_jurusan = ".$this->regist.".kd_jurusan
						LEFT JOIN ".$this->fakultas." ON ".$this->jurusan.".fakultas = ".$this->fakultas.".fakultas
						WHERE kd_jjar LIKE :jjar AND ".$this->jurusan.".fakultas LIKE :fakultas
						GROUP BY kolom
						ORDER BY ".$this->fakultas.".fakultas ASC;");
		$this->db->bind('jjar', '%'.$jjar.'%');
		$this->db->bind('tahun', $tahun);
		$this->db->bind('fakultas', '%'.$fakultas.'%');
		return $this->db->resultSet();
	}
	public function getRowFak($tahun){
		$this->db->query("SELECT ".$this->jurusan.".fakultas, 
								COALESCE(SUM(total_S01), 0) AS total_S01, 
								COALESCE(SUM(total_S02), 0) AS total_S02, 
								COALESCE(SUM(total_S03), 0) AS total_S03
						FROM ".$this->jurusan."
						LEFT JOIN (
							SELECT kd_jurusan, 
								SUM(CASE WHEN kd_seleksi = 'S01' THEN 1 ELSE 0 END) AS total_S01,
								SUM(CASE WHEN kd_seleksi = 'S02' THEN 1 ELSE 0 END) AS total_S02,
								SUM(CASE WHEN kd_seleksi = 'S03' THEN 1 ELSE 0 END) AS total_S03 
							FROM ".$this->regist."
							WHERE tahun =:tahun
							GROUP BY kd_jurusan
							) AS ".$this->regist." ON ".$this->jurusan.".kd_jurusan = ".$this->regist.".kd_jurusan
						GROUP BY ".$this->jurusan.".fakultas
						ORDER BY fakultas ASC;");
		$this->db->bind('tahun', $tahun);
		return $this->db->resultSet();
	}
	public function getMhs5y($jjar, $kolom, $fakultas){
		$this->db->query("SELECT $kolom AS kolom, ".$this->fakultas.".fakultas,
								COALESCE(SUM(tahun5_S01), 0) AS tahun5_S01, 
								COALESCE(SUM(tahun4_S01), 0) AS tahun4_S01, 
								COALESCE(SUM(tahun3_S01), 0) AS tahun3_S01, 
								COALESCE(SUM(tahun2_S01), 0) AS tahun2_S01, 
								COALESCE(SUM(tahun1_S01), 0) AS tahun1_S01, 
								
								COALESCE(SUM(tahun5_S02), 0) AS tahun5_S02,
								COALESCE(SUM(tahun4_S02), 0) AS tahun4_S02, 
								COALESCE(SUM(tahun3_S02), 0) AS tahun3_S02, 
								COALESCE(SUM(tahun2_S02), 0) AS tahun2_S02, 
								COALESCE(SUM(tahun1_S02), 0) AS tahun1_S02, 
								
								COALESCE(SUM(tahun5_S03), 0) AS tahun5_S03, 
								COALESCE(SUM(tahun4_S03), 0) AS tahun4_S03,
								COALESCE(SUM(tahun3_S03), 0) AS tahun3_S03,
								COALESCE(SUM(tahun2_S03), 0) AS tahun2_S03,
								COALESCE(SUM(tahun1_S03), 0) AS tahun1_S03
						FROM ".$this->jurusan."
						LEFT JOIN (
							SELECT kd_jurusan, 
									SUM(CASE WHEN tahun=:tahun5 AND kd_seleksi='S01' THEN 1 ELSE 0 END) AS tahun5_S01,
									SUM(CASE WHEN tahun=:tahun4 AND kd_seleksi='S01' THEN 1 ELSE 0 END) AS tahun4_S01,
									SUM(CASE WHEN tahun=:tahun3 AND kd_seleksi='S01' THEN 1 ELSE 0 END) AS tahun3_S01,
									SUM(CASE WHEN tahun=:tahun2 AND kd_seleksi='S01' THEN 1 ELSE 0 END) AS tahun2_S01,
									SUM(CASE WHEN tahun=:tahun1 AND kd_seleksi='S01' THEN 1 ELSE 0 END) AS tahun1_S01,

									SUM(CASE WHEN tahun=:tahun5 AND kd_seleksi='S02' THEN 1 ELSE 0 END) AS tahun5_S02,
									SUM(CASE WHEN tahun=:tahun4 AND kd_seleksi='S02' THEN 1 ELSE 0 END) AS tahun4_S02,
									SUM(CASE WHEN tahun=:tahun3 AND kd_seleksi='S02' THEN 1 ELSE 0 END) AS tahun3_S02,
									SUM(CASE WHEN tahun=:tahun2 AND kd_seleksi='S02' THEN 1 ELSE 0 END) AS tahun2_S02,
									SUM(CASE WHEN tahun=:tahun1 AND kd_seleksi='S02' THEN 1 ELSE 0 END) AS tahun1_S02,

									SUM(CASE WHEN tahun=:tahun5 AND kd_seleksi='S03' THEN 1 ELSE 0 END) AS tahun5_S03,
									SUM(CASE WHEN tahun=:tahun4 AND kd_seleksi='S03' THEN 1 ELSE 0 END) AS tahun4_S03,
									SUM(CASE WHEN tahun=:tahun3 AND kd_seleksi='S03' THEN 1 ELSE 0 END) AS tahun3_S03,
									SUM(CASE WHEN tahun=:tahun2 AND kd_seleksi='S03' THEN 1 ELSE 0 END) AS tahun2_S03,
									SUM(CASE WHEN tahun=:tahun1 AND kd_seleksi='S03' THEN 1 ELSE 0 END) AS tahun1_S03
							FROM ".$this->regist."
							GROUP BY kd_jurusan
						) AS ".$this->regist." ON ".$this->jurusan.".kd_jurusan = ".$this->regist.".kd_jurusan
						LEFT JOIN ".$this->fakultas." ON ".$this->jurusan.".fakultas = ".$this->fakultas.".fakultas
						WHERE kd_jjar LIKE :jjar AND ".$this->jurusan.".fakultas LIKE :fakultas
						GROUP BY kolom
						ORDER BY ".$this->fakultas.".fakultas ASC;");
		$this->db->bind('tahun5', date('Y')-4);
		$this->db->bind('tahun4', date('Y')-3);
		$this->db->bind('tahun3', date('Y')-2);
		$this->db->bind('tahun2', date('Y')-1);
		$this->db->bind('tahun1', date('Y'));
		$this->db->bind('jjar', '%'.$jjar.'%');
		$this->db->bind('fakultas', '%'.$fakultas.'%');
		return $this->db->resultSet();
	}
	public function getRowJenisKelamin($tahun, $jjar, $kolom, $fakultas){
		$this->db->query("SELECT $kolom AS kolom, 
								COALESCE(SUM(jumlah_laki_lakiS01), 0) AS total_S01L,
								COALESCE(SUM(jumlah_perempuanS01), 0) AS total_S01P,

								COALESCE(SUM(jumlah_laki_lakiS02), 0) AS total_S02L,
								COALESCE(SUM(jumlah_perempuanS02), 0) AS total_S02P,

								COALESCE(SUM(jumlah_laki_lakiS03), 0) AS total_S03L,
								COALESCE(SUM(jumlah_perempuanS03), 0) AS total_S03P	
						FROM ".$this->jurusan."
						LEFT JOIN (
							SELECT ".$this->regist.".kd_jurusan, 
									SUM(CASE WHEN ".$this->regist.".kd_seleksi='S01' AND jenis_kelamin='L' THEN 1 ELSE 0 END) AS jumlah_laki_lakiS01,
									SUM(CASE WHEN ".$this->regist.".kd_seleksi='S01' AND jenis_kelamin='P' THEN 1 ELSE 0 END) AS jumlah_perempuanS01,

									SUM(CASE WHEN ".$this->regist.".kd_seleksi='S02' AND jenis_kelamin='L' THEN 1 ELSE 0 END) AS jumlah_laki_lakiS02,
									SUM(CASE WHEN ".$this->regist.".kd_seleksi='S02' AND jenis_kelamin='P' THEN 1 ELSE 0 END) AS jumlah_perempuanS02,

									SUM(CASE WHEN ".$this->regist.".kd_seleksi='S03' AND jenis_kelamin='L' THEN 1 ELSE 0 END) AS jumlah_laki_lakiS03,
									SUM(CASE WHEN ".$this->regist.".kd_seleksi='S03' AND jenis_kelamin='P' THEN 1 ELSE 0 END) AS jumlah_perempuanS03
							FROM ".$this->regist."
							LEFT JOIN ".$this->passed." ON ".$this->regist.".no_pendaftaran = ".$this->passed.".no_pendaftaran
							WHERE ".$this->regist.".tahun =:tahun
							GROUP BY kd_jurusan
							) AS ".$this->regist." ON ".$this->jurusan.".kd_jurusan = ".$this->regist.".kd_jurusan
						LEFT JOIN ".$this->fakultas." ON ".$this->jurusan.".fakultas = ".$this->fakultas.".fakultas
						WHERE kd_jjar LIKE :jjar AND ".$this->jurusan.".fakultas LIKE :fakultas
						GROUP BY kolom
						ORDER BY ".$this->fakultas.".fakultas ASC;");
		$this->db->bind('jjar', '%'.$jjar.'%');
		$this->db->bind('tahun', $tahun);
		$this->db->bind('fakultas', '%'.$fakultas.'%');
		return $this->db->resultSet();
	}
	public function getRowJenisKelamin5y($jjar, $kolom, $fakultas, $seleksi){
		$this->db->query("SELECT $kolom AS kolom, 
								COALESCE(SUM(total5_L), 0) AS total5_L, 
								COALESCE(SUM(total5_P), 0) AS total5_P, 
								COALESCE(SUM(total4_L), 0) AS total4_L, 
								COALESCE(SUM(total4_P), 0) AS total4_P, 
								COALESCE(SUM(total3_L), 0) AS total3_L, 
								COALESCE(SUM(total3_P), 0) AS total3_P, 
								COALESCE(SUM(total2_L), 0) AS total2_L, 
								COALESCE(SUM(total2_P), 0) AS total2_P, 
								COALESCE(SUM(total1_L), 0) AS total1_L, 
								COALESCE(SUM(total1_P), 0) AS total1_P
						FROM ".$this->jurusan."
						LEFT JOIN (
							SELECT ".$this->regist.".kd_jurusan, 
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun5 AND jenis_kelamin = 'L' THEN 1 ELSE 0 END) AS total5_L,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun5 AND jenis_kelamin = 'P' THEN 1 ELSE 0 END) AS total5_P,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun4 AND jenis_kelamin = 'L' THEN 1 ELSE 0 END) AS total4_L,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun4 AND jenis_kelamin = 'P' THEN 1 ELSE 0 END) AS total4_P,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun3 AND jenis_kelamin = 'L' THEN 1 ELSE 0 END) AS total3_L,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun3 AND jenis_kelamin = 'P' THEN 1 ELSE 0 END) AS total3_P,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun2 AND jenis_kelamin = 'L' THEN 1 ELSE 0 END) AS total2_L,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun2 AND jenis_kelamin = 'P' THEN 1 ELSE 0 END) AS total2_P,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun1 AND jenis_kelamin = 'L' THEN 1 ELSE 0 END) AS total1_L,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun1 AND jenis_kelamin = 'P' THEN 1 ELSE 0 END) AS total1_P
							FROM ".$this->regist."
							LEFT JOIN ".$this->passed." ON ".$this->regist.".no_pendaftaran = ".$this->passed.".no_pendaftaran
							LEFT JOIN ".$this->seleksi." ON ".$this->regist.".kd_seleksi = ".$this->seleksi.".kd_seleksi
							WHERE singkatan LIKE :seleksi
							GROUP BY kd_jurusan
						) AS ".$this->regist." ON ".$this->jurusan.".kd_jurusan = ".$this->regist.".kd_jurusan
						LEFT JOIN ".$this->fakultas." ON ".$this->jurusan.".fakultas = ".$this->fakultas.".fakultas
						WHERE kd_jjar LIKE :jjar AND ".$this->jurusan.".fakultas LIKE :fakultas
						GROUP BY kolom
						ORDER BY ".$this->fakultas.".fakultas ASC;");
		$this->db->bind('tahun5', date('Y')-4);
		$this->db->bind('tahun4', date('Y')-3);
		$this->db->bind('tahun3', date('Y')-2);
		$this->db->bind('tahun2', date('Y')-1);
		$this->db->bind('tahun1', date('Y'));
		$this->db->bind('jjar', '%'.$jjar.'%');
		$this->db->bind('fakultas', '%'.$fakultas.'%');
		$this->db->bind('seleksi', '%'.$seleksi.'%');
		return $this->db->resultSet();
	}
	public function getRowDaerahAsal($tahun, $yesLike, $notLike, $null){
		$this->db->query("SELECT ".$this->provinsi.".kd_provinsi, ".$this->provinsi.".nama_provinsi, 
								COALESCE(SUM(total_S01), 0) AS total_S01, 
								COALESCE(SUM(total_S02), 0) AS total_S02,
								COALESCE(SUM(total_S03), 0) AS total_S03
						FROM ".$this->kota."
						LEFT JOIN (
							SELECT kd_kota, 
								SUM(CASE WHEN ".$this->regist.".kd_seleksi = 'S01' THEN 1 ELSE 0 END) AS total_S01,
								SUM(CASE WHEN ".$this->regist.".kd_seleksi = 'S02' THEN 1 ELSE 0 END) AS total_S02,
								SUM(CASE WHEN ".$this->regist.".kd_seleksi = 'S03' THEN 1 ELSE 0 END) AS total_S03 
							FROM ".$this->regist."
							LEFT JOIN ".$this->passed." ON ".$this->regist.".no_pendaftaran = ".$this->passed.".no_pendaftaran
							WHERE ".$this->regist.".tahun=:tahun
							GROUP BY kd_kota
						) AS ".$this->regist." ON ".$this->kota.".kd_kota = ".$this->regist.".kd_kota
						RIGHT JOIN ".$this->provinsi." ON ".$this->kota.".kd_provinsi = ".$this->provinsi.".kd_provinsi
						WHERE ".$this->provinsi.".kd_provinsi LIKE :yesLike 
						AND ".$this->provinsi.".kd_provinsi NOT LIKE :notLike
						AND ".$this->provinsi.".kd_provinsi NOT LIKE :null
						GROUP BY ".$this->provinsi.".nama_provinsi
						ORDER BY ".$this->provinsi.".kd_provinsi;");
		$this->db->bind('yesLike', '%'.$yesLike.'%');
		$this->db->bind('notLike', $notLike);
		$this->db->bind('null', $null);
		$this->db->bind('tahun', $tahun);
		return $this->db->resultSet();
	}
	public function getRowDaerahAsal5y($yesLike, $notLike, $null){
		$this->db->query("SELECT ".$this->provinsi.".kd_provinsi, ".$this->provinsi.".nama_provinsi, 
								COALESCE(SUM(tahun5_S01), 0) AS tahun5_S01, 
								COALESCE(SUM(tahun4_S01), 0) AS tahun4_S01, 
								COALESCE(SUM(tahun3_S01), 0) AS tahun3_S01, 
								COALESCE(SUM(tahun2_S01), 0) AS tahun2_S01, 
								COALESCE(SUM(tahun1_S01), 0) AS tahun1_S01, 
								
								COALESCE(SUM(tahun5_S02), 0) AS tahun5_S02,
								COALESCE(SUM(tahun4_S02), 0) AS tahun4_S02, 
								COALESCE(SUM(tahun3_S02), 0) AS tahun3_S02, 
								COALESCE(SUM(tahun2_S02), 0) AS tahun2_S02, 
								COALESCE(SUM(tahun1_S02), 0) AS tahun1_S02, 
								
								COALESCE(SUM(tahun5_S03), 0) AS tahun5_S03, 
								COALESCE(SUM(tahun4_S03), 0) AS tahun4_S03,
								COALESCE(SUM(tahun3_S03), 0) AS tahun3_S03,
								COALESCE(SUM(tahun2_S03), 0) AS tahun2_S03,
								COALESCE(SUM(tahun1_S03), 0) AS tahun1_S03
						FROM ".$this->kota."
						LEFT JOIN (
							SELECT kd_kota, 
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun5 AND ".$this->regist.".kd_seleksi='S01' THEN 1 ELSE 0 END) AS tahun5_S01,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun4 AND ".$this->regist.".kd_seleksi='S01' THEN 1 ELSE 0 END) AS tahun4_S01,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun3 AND ".$this->regist.".kd_seleksi='S01' THEN 1 ELSE 0 END) AS tahun3_S01,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun2 AND ".$this->regist.".kd_seleksi='S01' THEN 1 ELSE 0 END) AS tahun2_S01,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun1 AND ".$this->regist.".kd_seleksi='S01' THEN 1 ELSE 0 END) AS tahun1_S01,

									SUM(CASE WHEN ".$this->regist.".tahun=:tahun5 AND ".$this->regist.".kd_seleksi='S02' THEN 1 ELSE 0 END) AS tahun5_S02,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun4 AND ".$this->regist.".kd_seleksi='S02' THEN 1 ELSE 0 END) AS tahun4_S02,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun3 AND ".$this->regist.".kd_seleksi='S02' THEN 1 ELSE 0 END) AS tahun3_S02,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun2 AND ".$this->regist.".kd_seleksi='S02' THEN 1 ELSE 0 END) AS tahun2_S02,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun1 AND ".$this->regist.".kd_seleksi='S02' THEN 1 ELSE 0 END) AS tahun1_S02,

									SUM(CASE WHEN ".$this->regist.".tahun=:tahun5 AND ".$this->regist.".kd_seleksi='S03' THEN 1 ELSE 0 END) AS tahun5_S03,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun4 AND ".$this->regist.".kd_seleksi='S03' THEN 1 ELSE 0 END) AS tahun4_S03,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun3 AND ".$this->regist.".kd_seleksi='S03' THEN 1 ELSE 0 END) AS tahun3_S03,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun2 AND ".$this->regist.".kd_seleksi='S03' THEN 1 ELSE 0 END) AS tahun2_S03,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun1 AND ".$this->regist.".kd_seleksi='S03' THEN 1 ELSE 0 END) AS tahun1_S03
							FROM ".$this->regist."
							LEFT JOIN ".$this->passed." ON ".$this->regist.".no_pendaftaran = ".$this->passed.".no_pendaftaran
							GROUP BY kd_kota
						) AS ".$this->regist." ON ".$this->kota.".kd_kota = ".$this->regist.".kd_kota
						RIGHT JOIN ".$this->provinsi." ON ".$this->kota.".kd_provinsi = ".$this->provinsi.".kd_provinsi
						WHERE ".$this->provinsi.".kd_provinsi LIKE :yesLike 
						AND ".$this->provinsi.".kd_provinsi NOT LIKE :notLike
						AND ".$this->provinsi.".kd_provinsi NOT LIKE :null
						GROUP BY ".$this->provinsi.".nama_provinsi
						ORDER BY ".$this->provinsi.".kd_provinsi ASC;");
		$this->db->bind('tahun5', date('Y')-4);
		$this->db->bind('tahun4', date('Y')-3);
		$this->db->bind('tahun3', date('Y')-2);
		$this->db->bind('tahun2', date('Y')-1);
		$this->db->bind('tahun1', date('Y'));
		$this->db->bind('yesLike', '%'.$yesLike.'%');
		$this->db->bind('notLike', $notLike);
		$this->db->bind('null', $null);
		return $this->db->resultSet();
	}
	public function getTotal($jjar, $kolom, $fakultas){
		$this->db->query("SELECT $kolom AS kolom , ".$this->fakultas.".fakultas,
								COALESCE(SUM(tahun7), 0) AS tahun7, 
								COALESCE(SUM(tahun6), 0) AS tahun6, 
								COALESCE(SUM(tahun5), 0) AS tahun5, 
								COALESCE(SUM(tahun4), 0) AS tahun4, 
								COALESCE(SUM(tahun3), 0) AS tahun3, 
								COALESCE(SUM(tahun2), 0) AS tahun2, 
								COALESCE(SUM(tahun1), 0) AS tahun1
						FROM ".$this->jurusan."
						LEFT JOIN (
							SELECT ".$this->regist.".kd_jurusan, 
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun7 THEN 1 ELSE 0 END) AS tahun7,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun6 THEN 1 ELSE 0 END) AS tahun6,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun5 THEN 1 ELSE 0 END) AS tahun5,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun4 THEN 1 ELSE 0 END) AS tahun4,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun3 THEN 1 ELSE 0 END) AS tahun3,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun2 THEN 1 ELSE 0 END) AS tahun2,
									SUM(CASE WHEN ".$this->regist.".tahun=:tahun1 THEN 1 ELSE 0 END) AS tahun1
							FROM ".$this->regist."
							LEFT JOIN ".$this->passed." ON ".$this->regist.".no_pendaftaran = ".$this->passed.".no_pendaftaran
							GROUP BY kd_jurusan
						) AS ".$this->regist." ON ".$this->jurusan.".kd_jurusan = ".$this->regist.".kd_jurusan
						LEFT JOIN ".$this->fakultas." ON ".$this->jurusan.".fakultas = ".$this->fakultas.".fakultas
						WHERE kd_jjar LIKE :jjar AND ".$this->jurusan.".fakultas LIKE :fakultas
						GROUP BY kolom
						ORDER BY fakultas ASC;");
		$this->db->bind('tahun7', date('Y')-6);
		$this->db->bind('tahun6', date('Y')-5);
		$this->db->bind('tahun5', date('Y')-4);
		$this->db->bind('tahun4', date('Y')-3);
		$this->db->bind('tahun3', date('Y')-2);
		$this->db->bind('tahun2', date('Y')-1);
		$this->db->bind('tahun1', date('Y'));
		$this->db->bind('jjar', '%'.$jjar.'%');
		$this->db->bind('fakultas', '%'.$fakultas.'%');
		return $this->db->resultSet();
	}
	
}