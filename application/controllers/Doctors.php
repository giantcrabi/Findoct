<?php
class Doctors extends CI_Controller {

        function __construct()
        {
                parent::__construct();
                $this->load->library('pagination');

                // $this->load->helper('url');
                // $this->load->helper('form');
                // // $this->load->library('form_validation');
                $this->load->model('Doctors_model');
                $this->load->model('Tempat_Praktik_model');
                // $this->load->model('praktek_model');
                // $this->load->model('mymodel');
        }

        public function index($where = "")
        {       
                $data['dokter'] =$this->Doctors_model->GetAllDoctors($where);
                $data['title'] = 'Daftar Dokter';
                $data['data_gelar'] = $this->Doctors_model->GetAllGelar();

                $jumlah= $this->Doctors_model->jumlah();
 
                
                $config['base_url'] = base_url().'Doctors/index';
                $config['total_rows'] = $jumlah;
                $config['per_page'] = 4;
                $config['uri_segment'] = 3;
                //$config['first_url'] = base_url().'Doctors/index/1';
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
                $data['dokter_page'] = $this->Doctors_model->lihat($config['per_page'],$dari);
                $this->pagination->initialize($config); 
                

                $this->load->view('templates/headmain', $data);
                $this->load->view('templates/header');
                $this->load->view('Doctors/index', $data);
                $this->load->view('templates/footer');
        }

        public function info($Email){

                $data['title'] = 'Info Dokter';
                
                $data['dokter'] = $this->Doctors_model->getDoctors(" where Email = '$Email'");
                $data['dokter_tpraktek'] = $this->Doctors_model->getDoctorsInfo(" Email = '$Email'");

                $this->load->view('templates/headmain', $data);
                $this->load->view('templates/header');
                $this->load->view('doctors/info', $data);
                $this->load->view('templates/footer');

        }

        public function filter($where){
                // $widget_id = str_replace(array('['?']'), '',$where);
                $replace  = str_replace("?","",$where);
                $replace2  = str_replace("%20"," ",$replace);
                // var_dump($widget_id);
                $where1 = array('Gelar' => $replace);

                $jumlah= $this->Doctors_model->jumlahSpesifik(" where Gelar = '$replace2'");
               // echo $jumlah;
                $data['data_gelar'] = $this->Doctors_model->GetAllGelar();
                
                $config['base_url'] = base_url().'Doctors/index';
                $config['total_rows'] = $jumlah;
                $config['per_page'] = 4;
                $config['uri_segment'] = 3;
                //$config['first_url'] = base_url().'Doctors/index/1';
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
                $data['dokter_page'] = $this->Doctors_model->lihatSpesifik($config['per_page'],$dari, " where Gelar = '$replace2'");
                $this->pagination->initialize($config); 

                $data['dokter'] =$this->Doctors_model->GetAllDoctors($where);
                $data['title'] = 'Daftar Dokter '.$where;
                $this->load->view('templates/headmain', $data);
                $this->load->view('templates/header');
                $this->load->view('doctors/index', $data);
                $this->load->view('templates/footer');

        }

        public function cari()
        {
            // $data['dokter_page'] = $this->Doctors_model->caridata();
             

                $data['data_gelar'] = $this->Doctors_model->GetAllGelar();

                $jumlah= $this->Doctors_model->jumlah();
 
                
                $config['base_url'] = base_url().'Doctors/index';
                $config['total_rows'] = $jumlah;
                $config['per_page'] = 4;
                $config['uri_segment'] = 3;
                //$config['first_url'] = base_url().'Doctors/index/1';
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
                $data['dokter_page'] = $this->Doctors_model->caridata($config['per_page'],$dari);
                if($data['dokter_page']<=$config['per_page']){$this->pagination->initialize($config);}

                if($data['dokter_page']==null) {
                echo "<script>
                alert('Maaf data yang anda cari tidak ada atau keywordnya salah');
                window.location.href='index';
                </script>";

                }
                else {
                $data['title'] = 'Hasil Pencarian Dokter';
                $this->load->view('templates/headmain', $data);
                $this->load->view('templates/header');
                $this->load->view('doctors/index', $data);
                $this->load->view('templates/footer');
                // $this->load->view('doctors/index',$data); 

                }
        }

        public function view()
        {
            if ($this->session->userdata('user') === NULL)
            {
                redirect('login');
            }

            $data['sidebar'] = 'templates/Sidebar';
            $data['title'] = 'FINDOCT';
            $data['subtitle'] = 'Tabel Dokter';
            $data['list'] = $this->Doctors_model->list_all_doctor();
            $this->load->view('templates/headeradmin', $data);
            $this->load->view('doctors/view', $data);
            $this->load->view('templates/footeradmin');
        }

        public function add()
        {
            if ($this->session->userdata('user') === NULL)
            {
                redirect('login');
            }

            $this->form_validation->set_rules('email', 'Email', 'required|trim');
            $this->form_validation->set_rules('name', 'Nama Dokter', 'required|trim');
            $this->form_validation->set_rules('gelar', 'Gelar', 'required|trim');
            $this->form_validation->set_rules('foto', 'Foto', 'trim');

            if ($this->form_validation->run() != FALSE) {
                $this->Doctors_model->post_new_doctor();
                $this->session->set_flashdata('information', 'Data berhasil dimasukkan');
            }
            $data['sidebar'] = 'templates/Sidebar';
            $data['title'] = 'FINDOCT';
            $data['subtitle'] = 'Add Dokter';
            $this->load->view('templates/headeradmin', $data);
            $this->load->view('doctors/add', $data);
            $this->load->view('templates/footeradmin');
        }

        public function edit($id)
        {
            if ($this->session->userdata('user') === NULL)
            {
                redirect('login');
            }

            $this->form_validation->set_rules('name', 'Nama Dokter', 'required|trim');
            $this->form_validation->set_rules('gelar', 'Gelar', 'required|trim');
            $this->form_validation->set_rules('foto', 'Foto', 'trim');

            if ($this->form_validation->run() === FALSE) {
                $data['values'] = $this->Doctors_model->get_doctor($id);
                $data['sidebar'] = 'templates/Sidebar';
                $data['title'] = 'FINDOCT';
                $data['subtitle'] = 'Edit Dokter';
                $this->load->view('templates/headeradmin', $data);
                $this->load->view('doctors/edit', $data);
                $this->load->view('templates/footeradmin');
            }
            else
            {
                $this->Doctors_model->update_doctor($id);
                redirect('doctors/view');
            }
        }

        public function delete($id)
        {
            if ($this->session->userdata('user') === NULL)
            {
                redirect('login');
            }

            $this->Doctors_model->delete_doctor($id);
            redirect('doctors/view');
        }

        public function assign()
        {
            if ($this->session->userdata('user') === NULL)
            {
                redirect('login');
            }
            
            $data['listdokter'] = $this->Doctors_model->list_all_doctor();
            $data['listpraktek'] = $this->Tempat_Praktik_model->list_all_tpraktek();

            $data['sidebar'] = 'templates/Sidebar';
            $data['title'] = 'FINDOCT';
            $data['subtitle'] = 'Assign Jadwal Praktek';
            $this->load->view('templates/headeradmin', $data);
            $this->load->view('doctors/assign', $data);
            $this->load->view('templates/footeradmin');
        }
        
        public function getJadwal()
        {
            $data['listjadwal'] = $this->Doctors_model->get_jadwal();
            $data['listpraktek'] = array();
            foreach ($data['listjadwal'] as $row):
                array_push($data['listpraktek'],$this->Tempat_Praktik_model->get_tpraktek($row->IDTPraktek));
            endforeach;
            $complete_data = array();
            $i = 0;
            foreach ($data['listpraktek'] as $row):
                array_push($complete_data, (object) array("idtpraktek" => $row->IDTPraktek, "namatpraktek" => $row->NamaTPraktek, "senin" => $data['listjadwal'][$i]->Senin, "selasa" => $data['listjadwal'][$i]->Selasa, "rabu" => $data['listjadwal'][$i]->Rabu, "kamis" => $data['listjadwal'][$i]->Kamis, "jumat" => $data['listjadwal'][$i]->Jumat));
                $i = $i + 1;
            endforeach;
            echo json_encode($complete_data);
        }

        public function addJadwal()
        {
            $this->Doctors_model->post_new_jadwal();
        }

        public function delJadwal()
        {
            $this->Doctors_model->delete_jadwal();
        }

        public function checkJadwal()
        {
            $exist = $this->Doctors_model->check_jadwal();
            echo json_encode($exist);
        }
}