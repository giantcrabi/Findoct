<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Doctors_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
        $this->load->database();
	}

	public function post_new_doctor()
    {
    	$foto = $this->input->post('foto',TRUE);

    	if ($foto == "") {
    		$foto = "profileblank.png";
    	}

    	$data = array(
		    'Email' => $this->input->post('email',TRUE),
		    'Nama' => $this->input->post('name',TRUE),
        	'Gelar' => $this->input->post('gelar',TRUE),
		    'Foto' => $foto
		);

		return $this->db->insert('dokter', $data);
    }

    public function list_all_doctor()
    {
        return $this->db->get('dokter')->result();
    }

    public function get_doctor($id)
    {
        return $this->db->get_where('dokter', array('Email' => $id))->row();
    }

    public function update_doctor($id)
    {
        $foto = $this->input->post('foto',TRUE);

    	if ($foto == "") {
    		$foto = "profileblank.png";
    	}

    	$data = array(
		    'Nama' => $this->input->post('name',TRUE),
        	'Gelar' => $this->input->post('gelar',TRUE),
		    'Foto' => $foto
		);
        $this->db->where('Email',$id);
        return $this->db->update('dokter',$data);
    }

    public function delete_doctor($id)
    {
        $this->db->where('Email',$id);
        return $this->db->delete('dokter');
    }

    public function post_new_jadwal()
    {
        $data = array(
            'Email' => $this->input->post('email',TRUE),
            'IDTPraktek' => $this->input->post('idtpraktek',TRUE),
            'Senin' => $this->input->post('senin',TRUE),
            'Selasa' => $this->input->post('selasa',TRUE),
            'Rabu' => $this->input->post('rabu',TRUE),
            'Kamis' => $this->input->post('kamis',TRUE),
            'Jumat' => $this->input->post('jumat',TRUE)
        );

        return $this->db->insert('dokter_tpraktek', $data);
    }
    public function get_jadwal()
    {
        $email = $this->input->post('email',TRUE);
        return $this->db->get_where('dokter_tpraktek', array('Email' => $email))->result();
    }
    public function delete_jadwal()
    {
        $email = $this->input->post('email',TRUE);
        $idtpraktek = $this->input->post('idtpraktek',TRUE);

        $this->db->where('Email',$email);
        $this->db->where('IDTPraktek',$idtpraktek);
        return $this->db->delete('dokter_tpraktek');
    }
    public function check_jadwal()
    {
        $email = $this->input->post('email',TRUE);
        $idtpraktek = $this->input->post('idtpraktek',TRUE);
        return $this->db->get_where('dokter_tpraktek', array('Email' => $email, 'IDTPraktek' => $idtpraktek))->row();
    }

	public function GetAllDoctors($where = "") {
		$data = $this->db->query('select * from dokter');
		return $data->result_array();
	}

	public function GetAllGelar() {
		$data = $this->db->query('select distinct Gelar from dokter');
		return $data->result_array();
	}

	public function GetSpecificDoctors($where = "") {
		$data = $this->db->query('select * from dokter' . $where);
		return $data->result_array();
	}

	public function getDoctors($where){
		$data = $this->db->query('select * from dokter' . $where);
		return $data->result_array();	
	}

	public function getDoctorsInfo($where){
		$this->db->select('*');
		$this->db->from('dokter_tpraktek');
		$this->db->where($where);
		$this->db->join('tpraktek', 'tpraktek.IDTPraktek = dokter_tpraktek.IDTPraktek');
		$query = $this->db->get();
		return $query->result_array();
	}	

	public function lihat($sampai,$dari){
		return $query = $this->db->get('dokter',$sampai,$dari)->result();
		
	}
 
	public function jumlah(){
		return $this->db->get('dokter')->num_rows();
	}

	public function jumlahSpesifik($where){
		//$data = $this->db->get()->num_rows();
		return $this->db->query('select * from dokter' . $where)->num_rows();
	}	

	public function lihatSpesifik($sampai,$dari,$where){
		return $query = $this->db->query('select * from dokter' . $where, $sampai, $dari )->result();
		
	}

	public function caridata($sampai,$dari){
		$c = $this->input->POST ('cari');
		$this->db->like('nama', $c);
		$query = $this->db->get('dokter',$sampai,$dari);
		return $query->result(); 
 	}
}
