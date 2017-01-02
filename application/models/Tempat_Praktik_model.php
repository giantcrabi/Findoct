<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tempat_Praktik_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
        $this->load->database();
	}

	public function post_new_tpraktek()
    {
    	$foto = $this->input->post('foto',TRUE);

    	if ($foto == "") {
    		$foto = "noimg.jpg";
    	}

    	$data = array(
		    'NamaTPraktek' => $this->input->post('name',TRUE),
		    'Alamat' => $this->input->post('alamat',TRUE),
        	'Kota' => $this->input->post('kota',TRUE),
        	'Provinsi' => $this->input->post('provinsi',TRUE),
        	'KodePos' => $this->input->post('kodepos',TRUE),
		    'Foto' => $foto
		);

		return $this->db->insert('tpraktek', $data);
    }

    public function list_all_tpraktek()
    {
        return $this->db->get('tpraktek')->result();
    }

    public function get_tpraktek($id)
    {
        return $this->db->get_where('tpraktek', array('IDTPraktek' => $id))->row();
    }

    public function update_tpraktek($id)
    {
        $foto = $this->input->post('foto',TRUE);

    	if ($foto == "") {
    		$foto = "noimg.jpg";
    	}

    	$data = array(
		    'NamaTPraktek' => $this->input->post('name',TRUE),
		    'Alamat' => $this->input->post('alamat',TRUE),
        	'Kota' => $this->input->post('kota',TRUE),
        	'Provinsi' => $this->input->post('provinsi',TRUE),
        	'KodePos' => $this->input->post('kodepos',TRUE),
		    'Foto' => $foto
		);
        $this->db->where('IDTPraktek',$id);
        return $this->db->update('tpraktek',$data);
    }

    public function delete_tpraktek($id)
    {
        $this->db->where('IDTPraktek',$id);
        return $this->db->delete('tpraktek');
    }

	public function GetAllPraktik($where = "") {
		$data = $this->db->query('select * from tpraktek');
		return $data->result_array();
	}

	public function jumlah(){
		return $this->db->get('tpraktek')->num_rows();
	}

	public function lihat($sampai,$dari){
		return $query = $this->db->get('tpraktek',$sampai,$dari)->result();
		
	}

	public function getTP($where){
		$data = $this->db->query('select * from tpraktek where' . $where);
		return $data->result_array();	
	}

	public function getTPInfo($where){
	
		$this->db->select('*');
    	$this->db->from('dokter_tpraktek dt'); 
        $this->db->join('dokter d', 'd.Email=dt.Email', 'left');
        $this->db->join('tpraktek t', 't.IDTPraktek=dt.IDTPraktek', 'left');
        $this->db->where($where);
        // $this->db->order_by('c.track_title','asc');         
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
            {
                return $query->result_array();
            }
            else
            {
                return false;
            }
	}

	public function caridata($sampai,$dari){
		$c = $this->input->POST ('cari');
		$this->db->like('NamaTPraktek', $c);
		$query = $this->db->get('tpraktek',$sampai,$dari);
		return $query->result(); 
 	}
}