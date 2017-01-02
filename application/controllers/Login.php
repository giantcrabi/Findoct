<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

	public function index()
	{
		if ($this->session->userdata('user'))
		{
			redirect('doctors/view');
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|callback_check_login');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('login_view');
        }
        else
        {
			redirect('doctors/view');
        }
	}

	public function logout()
	{
        $this->session->sess_destroy();
        redirect('login');
	}

	function check_login() {
		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);

		$user = $this->User_model->get_user($username,$password);

		if($user != NULL) {
			$user_data = array(
				'user'	=> $user[0]['Username'],
				'name'	=> $user[0]['Name']
			);
			$this->session->set_userdata($user_data);
			return TRUE;
		} else {
			$this->form_validation->set_message('check_login', 'Username & Password are invalid!');
			return FALSE;
		}
	}

}