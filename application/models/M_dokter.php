<?php 
class M_dokter extends CI_Model{

	function get_all_dokter(){
		$hsl=$this->db->query("SELECT tbl_dokter.*,kota_nama FROM tbl_dokter JOIN tbl_kota ON dokter_kota_id=kota_id");
		return $hsl;
	}

	function simpan_dokter($nip,$nama,$jenkel,$kota,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_dokter (dokter_nip,dokter_nama,dokter_jenkel,dokter_kota_id,dokter_photo) VALUES ('$nip','$nama','$jenkel','$kota','$photo')");
		return $hsl;
	}
	function simpan_dokter_tanpa_img($nip,$nama,$jenkel,$kota){
		$hsl=$this->db->query("INSERT INTO tbl_dokter (dokter_nip,dokter_nama,dokter_jenkel,dokter_kota_id) VALUES ('$nip','$nama','$jenkel','$kota')");
		return $hsl;
	}

	function update_dokter($kode,$nip,$nama,$jenkel,$kota,$photo){
		$hsl=$this->db->query("UPDATE tbl_dokter SET dokter_nip='$nip',dokter_nama='$nama',dokter_jenkel='$jenkel',dokter_kota_id='$kota',dokter_photo='$photo' WHERE dokter_id='$kode'");
		return $hsl;
	}
	function update_dokter_tanpa_img($kode,$nip,$nama,$jenkel,$kota){
		$hsl=$this->db->query("UPDATE tbl_dokter SET dokter_nip='$nip',dokter_nama='$nama',dokter_jenkel='$jenkel',dokter_kota_id='$kota' WHERE dokter_id='$kode'");
		return $hsl;
	}
	function hapus_dokter($kode){
		$hsl=$this->db->query("DELETE FROM tbl_dokter WHERE dokter_id='$kode'");
		return $hsl;
	}

	function dokter(){
		$hsl=$this->db->query("SELECT tbl_dokter.*,kota_nama FROM tbl_dokter JOIN tbl_kota ON dokter_kota_id=kota_id");
		return $hsl;
	}
	function dokter_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT tbl_dokter.*,kota_nama FROM tbl_dokter JOIN tbl_kota ON dokter_kota_id=kota_id limit $offset,$limit");
		return $hsl;
	}

}