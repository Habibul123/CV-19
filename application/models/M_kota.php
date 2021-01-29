<?php
class M_kota extends CI_Model{

	function get_all_kota(){
		$hsl=$this->db->query("SELECT * FROM tbl_kota");
		return $hsl;
	}

}