<?php
class Kelola_model{
    private $db;

	public function __construct(){
		$this->db = new Database;
	}
	public function getAll($kolom){
		$this->db->query("SELECT    
                            maba_passed.tahun,
                            COUNT(maba_passed.no_pendaftaran) as passed,
                            COALESCE(SUM(CASE WHEN reg = '1' THEN 1 ELSE 0 END), 0) AS regist,
                            COALESCE(SUM(CASE WHEN s_nim = '1' THEN 1 ELSE 0 END), 0) AS nim
                        FROM maba_passed
                        LEFT JOIN maba_regist ON maba_passed.no_pendaftaran = maba_regist.no_pendaftaran
						WHERE maba_passed.kd_seleksi LIKE :kolom
                        GROUP BY  maba_passed.tahun
                        ORDER BY  maba_passed.tahun DESC;");
		$this->db->bind('kolom', '%'.$kolom.'%');
		return $this->db->resultSet();
	}
	public function hapusDataMhs($id,$seleksi){
		$query = "DELETE FROM maba_passed WHERE tahun=:id AND kd_seleksi LIKE :seleksi";
		$this->db->query($query);
		$this->db->bind('seleksi', '%'.$seleksi.'%');
		$this->db->bind('id', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}
    public function hapusDataSeleksiS01($id){
		$query = "DELETE FROM maba_passed WHERE tahun=:id AND kd_seleksi = 'S01'";
		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}
    public function hapusDataSeleksiS02($id){
		$query = "DELETE FROM maba_passed WHERE tahun=:id AND kd_seleksi = 'S02'";
		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}
    public function hapusDataSeleksiS03($id){
		$query = "DELETE FROM maba_passed WHERE tahun=:id AND kd_seleksi = 'S03'";
		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	
}

