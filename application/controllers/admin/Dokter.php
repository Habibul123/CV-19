<?php
class Dokter extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_dokter');
		$this->load->model('m_pengguna');
		$this->load->model('m_kota');
		$this->load->library('upload');
	}


	function index(){
		$x['kota']=$this->m_kota->get_all_kota();
		$x['data']=$this->m_dokter->get_all_dokter();
		$this->load->view('admin/v_dokter',$x);
	}
	
	function simpan_dokter(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $photo=$gbr['file_name'];
							$nip=strip_tags($this->input->post('xnip'));
							$nama=strip_tags($this->input->post('xnama'));
							$jenkel=strip_tags($this->input->post('xjenkel'));
							$kota=strip_tags($this->input->post('xkota'));

							$this->m_dokter->simpan_dokter($nip,$nama,$jenkel,$kota,$photo);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/dokter');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/dokter');
	                }
	                 
	            }else{
	            	$nip=strip_tags($this->input->post('xnip'));
					$nama=strip_tags($this->input->post('xnama'));
					$jenkel=strip_tags($this->input->post('xjenkel'));
					$kota=strip_tags($this->input->post('xkota'));

					$this->m_dokter->simpan_dokter_tanpa_img($nip,$nama,$jenkel,$kota);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/dokter');
				}
				
	}
	
	function update_dokter(){
				
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();
	                        $gambar=$this->input->post('gambar');
							$path='./assets/images/'.$gambar;
							unlink($path);

	                        $photo=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
							$nip=strip_tags($this->input->post('xnip'));
							$nama=strip_tags($this->input->post('xnama'));
							$jenkel=strip_tags($this->input->post('xjenkel'));
							$kota=strip_tags($this->input->post('xkota'));

							$this->m_dokter->update_dokter($kode,$nip,$nama,$jenkel,$kota,$photo);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/dokter');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/dokter');
	                }
	                
	            }else{
							$kode=$this->input->post('kode');
							$nip=strip_tags($this->input->post('xnip'));
							$nama=strip_tags($this->input->post('xnama'));
							$jenkel=strip_tags($this->input->post('xjenkel'));
							$kota=strip_tags($this->input->post('xkota'));

							$this->m_dokter->update_dokter_tanpa_img($kode,$nip,$nama,$jenkel,$kota);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/dokter');
	            } 

	}

	function hapus_dokter(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_dokter->hapus_dokter($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/dokter');
	}

}