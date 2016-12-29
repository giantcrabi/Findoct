<?php
class TempatPraktik extends CI_Controller {

        function __construct()
        {
                parent::__construct();
                $this->load->library('pagination');
                $this->load->model('Tempat_Praktik_model');
        }

        public function index(){
                $data['tempat_praktik'] = $this->Tempat_Praktik_model->GetAllPraktik();
                $data['title'] = 'Daftar Tempat Praktek';

                $jumlah= $this->Tempat_Praktik_model->jumlah();
 
                
                $config['base_url'] = base_url().'TempatPraktik/index';
                $config['total_rows'] = $jumlah;
                $config['per_page'] = 4;
                $config['uri_segment'] = 3;    
                //$config['first_url'] = base_url().'TempatPraktik/index/1';
                $config['full_tag_open'] = "<ul class='pagination'>";
                $config['full_tag_close'] ="</ul>";
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
                $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
                $config['next_tag_open'] = "<li>";
                $config['next_tagl_close'] = "</li>";
                $config['prev_tag_open'] = "<li>";
                $config['prev_tagl_close'] = "</li>";
                $config['first_tag_open'] = "<li>";
                $config['first_tagl_close'] = "</li>";
                $config['last_tag_open'] = "<li>";
                $config['last_tagl_close'] = "</li>";       
 
                $dari = $this->uri->segment(3,0);
                $data['tp_page'] = $this->Tempat_Praktik_model->lihat($config['per_page'],$dari);
                $this->pagination->initialize($config); 
                
                $this->load->view('templates/headmain', $data);
                $this->load->view('templates/header');
                $this->load->view('praktek/index.php', $data);
                $this->load->view('templates/footer');
        }

        public function info($Nama){

                $data['title'] = 'Info Tempat Praktek';
                $replace  = str_replace("%20"," ",$Nama);
                $data['doktor'] = $this->Tempat_Praktik_model->getTPinfo(" NamaTPraktek = '$replace'");
                $data['tpraktek'] = $this->Tempat_Praktik_model->getTP(" NamaTPraktek = '$replace'");
                
                $this->load->view('templates/headmain', $data);
                $this->load->view('templates/header');
                $this->load->view('praktek/info', $data);
                $this->load->view('templates/footer');

        }

        public function cari()
        {
            // $data['dokter_page'] = $this->Doctors_model->caridata();
             

                // $data['data_gelar'] = $this->Doctors_model->GetAllGelar();

                $jumlah= $this->Tempat_Praktik_model->jumlah();
 
                
                $config['base_url'] = base_url().'TempatPraktik/index';
                $config['total_rows'] = $jumlah;
                $config['per_page'] = 4;
                $config['uri_segment'] = 3;
                //$config['first_url'] = base_url().'TempatPraktik/index/1';
                $config['full_tag_open'] = "<ul class='pagination'>";
                $config['full_tag_close'] ="</ul>";
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
                $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
                $config['next_tag_open'] = "<li>";
                $config['next_tagl_close'] = "</li>";
                $config['prev_tag_open'] = "<li>";
                $config['prev_tagl_close'] = "</li>";
                $config['first_tag_open'] = "<li>";
                $config['first_tagl_close'] = "</li>";
                $config['last_tag_open'] = "<li>";
                $config['last_tagl_close'] = "</li>";
                
                $dari = $this->uri->segment(3,0);
                $data['tp_page'] = $this->Tempat_Praktik_model->caridata($config['per_page'],$dari);
                if($data['tp_page']<=$config['per_page']){$this->pagination->initialize($config);}

                if($data['tp_page']==null) {
                echo "<script>
                alert('Maaf data yang anda cari tidak ada atau keywordnya salah');
                window.location.href='index';
                </script>";

                }
                else {
                $data['title'] = 'Hasil Pencarian Tempat Praktek';
                $this->load->view('templates/headmain', $data);
                $this->load->view('templates/header');
                $this->load->view('praktek/index', $data);
                $this->load->view('templates/footer');
                // $this->load->view('doctors/index',$data); 

                }
        }

        public function add()
        {
            $this->form_validation->set_rules('name', 'Nama Tempat Praktek', 'required|trim');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
            $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
            $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
            $this->form_validation->set_rules('kodepos', 'Kode Pos', 'trim');
            $this->form_validation->set_rules('foto', 'foto', 'trim');

            if ($this->form_validation->run() != FALSE) {
                $this->Tempat_Praktik_model->post_new_tpraktek();
                $this->session->set_flashdata('information', 'Data berhasil dimasukkan');
            }
            $data['sidebar'] = 'templates/Sidebar';
            $data['title'] = 'FINDOCT';
            $data['subtitle'] = 'Add Tempat Praktek';
            $this->load->view('templates/headeradmin', $data);
            $this->load->view('praktek/add', $data);
            $this->load->view('templates/footeradmin');
        }
}