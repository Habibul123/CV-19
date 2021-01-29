<?php 
class M_gejala extends CI_Model{

	function get_all_gejala(){
		$hsl=$this->db->query("SELECT * FROM tbl_gejala");
		return $hsl;
	}

	function simpan_gejala($nama,$tgl_lahir,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_gejala (gejala_nama,gejala_tgl_lahir,gejala_photo) VALUES ('$nama','$tgl_lahir','$photo')");
		return $hsl;
	}
	function simpan_gejala_tanpa_img($nama,$tgl_lahir,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_gejala (gejala_nama,gejala_tgl_lahir,gejala_photo) VALUES ('$nama','$tgl_lahir','$photo')");
		return $hsl;
	}

	function update_gejala($nama,$tgl_lahir,$photo){
		$hsl=$this->db->query("UPDATE tbl_gejala SET gejala_nama='$nama',gejala_tgl_lahir='$tgl_lahir',gejala_photo='$photo' WHERE gejala_id='$kode'");
		return $hsl;
	}
	function update_gejala_tanpa_img($nama,$tgl_lahir,$mapel){
		$hsl=$this->db->query("UPDATE tbl_gejala SET gejala_nama='$nama',gejala_tgl_lahir='$tgl_lahir' WHERE gejala_id='$kode'");
		return $hsl;
	}
	function hapus_gejala($kode){
		$hsl=$this->db->query("DELETE FROM tbl_gejala WHERE gejala_id='$kode'");
		return $hsl;
	}

	//front-end
	function gejala(){
		$hsl=$this->db->query("SELECT * FROM tbl_gejala");
		return $hsl;
	}
	function gejala_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_gejala limit $offset,$limit");
		return $hsl;
	}

}