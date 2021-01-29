<?php
class About extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['tot_gejala']=$this->db->get('tbl_gejala')->num_rows();
		$x['tot_dokter']=$this->db->get('tbl_dokter')->num_rows();
		$x['tot_files']=$this->db->get('tbl_files')->num_rows();
	
		$this->load->view('depan/v_about',$x);
	}
}
