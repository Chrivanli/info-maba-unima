<?php 
class Import_model{
    private $maba_passed = 'maba_passed';
    private $maba_regist = 'maba_regist';
    private $ref_kota    = 'ref_kota';
    private $db;

	public function __construct(){
		$this->db = new Database;
	}
    public function lastUpdatePassed(){
        $this->db->query("WITH RankedMahasiswa AS (
                            SELECT maba_passed.kd_seleksi, 
                                    singkatan, 
                                    COUNT(*) AS total_mhs, tahun,
                                    MAX(updated_at) AS last_update,
                                    ROW_NUMBER() OVER (PARTITION BY maba_passed.kd_seleksi ORDER BY updated_at DESC) AS rn
                            FROM  maba_passed
                            LEFT JOIN ref_seleksi ON maba_passed.kd_seleksi = ref_seleksi.kd_seleksi
                            GROUP BY tahun, kd_seleksi
                        )
                        SELECT kd_seleksi, singkatan, total_mhs, tahun, last_update
                        FROM RankedMahasiswa
                        WHERE  rn = 1
                        ORDER BY kd_seleksi ASC");
		return $this->db->resultSet();
	}
    public function lastUpdateRegist(){
        $this->db->query("WITH RankedMahasiswa AS (
                            SELECT maba_regist.kd_seleksi, 
                                    singkatan, 
                                    COUNT(*) AS total_mhs, tahun,
                                    MAX(updated_at) AS last_update,
                                    ROW_NUMBER() OVER (PARTITION BY maba_regist.kd_seleksi ORDER BY updated_at DESC) AS rn
                            FROM  maba_regist
                            LEFT JOIN ref_seleksi ON maba_regist.kd_seleksi = ref_seleksi.kd_seleksi
                            GROUP BY tahun, kd_seleksi
                        )
                        SELECT kd_seleksi, singkatan, total_mhs, tahun, last_update
                        FROM RankedMahasiswa
                        WHERE  rn = 1
                        ORDER BY kd_seleksi ASC");
		return $this->db->resultSet();
	}
    public function ref_kota(){
        $this->db->query("SELECT kd_kota FROM ".$this->ref_kota);
		return $this->db->resultSet();
	}
    public function importDataPassed($data, $tahun){
        $result = $this->ref_kota();
        foreach($result as $row){
            $kota = substr($data[7], 0, 4);
            $kd_kota = $row["kd_kota"];
            if($kota == $kd_kota){
                break;
            }else {
                $kota = 9999;
            }
        }
        $query = "INSERT INTO ".$this->maba_passed." VALUES (:no_pendaftaran,:kd_seleksi,:nisn,:nama,:jenis_kelamin,
                                                    :tanggal_lahir,:npsn,:nik,:kd_kota,:kd_jurusan,:kip_k, 
                                                    :tahun,NOW(),NOW())";
        $this->db->query($query);
        $this->db->bind('no_pendaftaran', $data[0]);
        $this->db->bind('kd_seleksi',  $data[1]);
        $this->db->bind('nisn',  $data[2]);
        $this->db->bind('nama',  $data[3]);
        $this->db->bind('jenis_kelamin',  $data[4]);
        $this->db->bind('tanggal_lahir',  $data[5]);
        $this->db->bind('npsn',  $data[6]);
        $this->db->bind('nik',  $data[7]);
        $this->db->bind('kd_kota',  $kota);
        $this->db->bind('kd_jurusan',  $data[8]);
        $this->db->bind('kip_k',  $data[9]);
        $this->db->bind('tahun',  $tahun);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function importDataRegist($data, $tahun){
        $query = "INSERT INTO ".$this->maba_regist." VALUES (:no_pendaftaran,:kd_seleksi,:nama,:kd_jurusan,:s_verifikasi,
                                                    :tgl_verifikasi,:s_kipk,:s_bayar,:tgl_bayar,:s_nim,:tgl_nim, 
                                                    :nim,:reg,:tahun,NOW(),NOW())";
        $this->db->query($query);
        $this->db->bind('no_pendaftaran', $data[0]);
        $this->db->bind('kd_seleksi',  $data[1]);
        $this->db->bind('nama',  $data[2]);
        $this->db->bind('kd_jurusan',  $data[3]);
        $this->db->bind('s_verifikasi',  $data[4]);
        $this->db->bind('tgl_verifikasi',  $data[5]);
        $this->db->bind('s_kipk',  $data[6]);
        $this->db->bind('s_bayar',  $data[7]);
        $this->db->bind('tgl_bayar',  $data[8]);
        $this->db->bind('s_nim',  $data[9]);
        $this->db->bind('tgl_nim',  $data[10]);
        $this->db->bind('nim',  $data[11]);
        $this->db->bind('reg',  $data[12]);
        $this->db->bind('tahun',  $tahun);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusDataPassed($seleksi, $tahun){
        $query = "DELETE FROM ".$this->maba_passed." WHERE kd_seleksi =:seleksi AND tahun =:tahun";
        $this->db->query($query);
		$this->db->bind('seleksi', $seleksi);
		$this->db->bind('tahun', $tahun);
		$this->db->execute();
		return $this->db->rowCount();
    }
    public function hapusDataRegist($seleksi, $tahun){
        $query = "DELETE FROM ".$this->maba_regist." WHERE kd_seleksi =:seleksi AND tahun =:tahun";
        $this->db->query($query);
		$this->db->bind('seleksi', $seleksi);
		$this->db->bind('tahun', $tahun);
		$this->db->execute();
		return $this->db->rowCount();
    }
    //Validasi 
    public function cekMabaPassed($id, $tahun){
		$this->db->query("SELECT * FROM ".$this->maba_passed." WHERE no_pendaftaran=:id AND NOT tahun =:tahun ");
		$this->db->bind('id', $id);
		$this->db->bind('tahun', $tahun);
		$this->db->execute();
		return $this->db->rowCount();
	}
    public function cekMabaPassed2($id, $tahun, $seleksi){
		$this->db->query("SELECT * FROM ".$this->maba_passed." WHERE no_pendaftaran=:id AND tahun =:tahun AND NOT kd_seleksi=:seleksi");
		$this->db->bind('id', $id);
		$this->db->bind('tahun', $tahun);
		$this->db->bind('seleksi', $seleksi);
		$this->db->execute();
		return $this->db->rowCount();
	}
    public function cekMabaRegist($id, $tahun){
		$this->db->query("SELECT * FROM ".$this->maba_regist." WHERE no_pendaftaran=:id AND NOT tahun =:tahun ");
		$this->db->bind('id', $id);
		$this->db->bind('tahun', $tahun);
		$this->db->execute();
		return $this->db->rowCount();
	}
    public function cekMabaRegist2($id, $tahun, $seleksi){
		$this->db->query("SELECT * FROM ".$this->maba_regist." WHERE no_pendaftaran=:id AND tahun =:tahun AND NOT kd_seleksi=:seleksi");
		$this->db->bind('id', $id);
		$this->db->bind('tahun', $tahun);
		$this->db->bind('seleksi', $seleksi);
		$this->db->execute();
		return $this->db->rowCount();
	}
    public function cekRelasi($id, $tahun){
		$this->db->query("SELECT * FROM ".$this->maba_passed." WHERE no_pendaftaran=:id AND tahun =:tahun ");
		$this->db->bind('id', $id);
		$this->db->bind('tahun', $tahun);
		$this->db->execute();
		return $this->db->rowCount();
	}
}