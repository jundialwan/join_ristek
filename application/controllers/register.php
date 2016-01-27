<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Register extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {

		if (!($this->is_logged_in())) {
			# user not logged in
			# redirect to ssologin
			redirect(site_url('ssologin'));
		} else {
			# user logged in

			// get user data from session
			$user = $this->session->userdata('userdata');

			// if admin redirect to admin page
			if ($this->isAdmin($user['username'])) redirect(site_url('admin747835'));

			// check if user registered or not
			if (!($this->isRegistered($user['username']))) {
				// user not registered				

				if($_SERVER['REQUEST_METHOD'] == 'POST') {
					// check if user logged in or not
					if (!$this->is_logged_in()) {
						// user not logged in
						// redirect to sso login
						redirect(site_url('ssologin'));
					} else {
						// user logged in

						# do some form validation
						
						# load helper and library
						$this->load->helper('form');
						$this->load->library('form_validation');

						# set form validation rules
						$this->form_validation->set_rules('namalengkap_input', 'Nama Lengkap', 'trim|required|max_length[100]');
						$this->form_validation->set_rules('npm_input', 'NPM', 'trim|required|max_length[10]');
						$this->form_validation->set_rules('angkatan_input', 'Angkatan', 'trim|required|max_length[4]');
						$this->form_validation->set_rules('jurusan_input', 'Jurusan', 'trim|required|max_length[50]');
						$this->form_validation->set_rules('email_input', 'Email', 'trim|required|xss_clean|valid_email|max_length[50]');
						$this->form_validation->set_rules('phone_input', 'Phone', 'trim|required|max_length[20]');

						$this->form_validation->set_rules('sig1_input', 'SIG Pilihan 1', 'trim|required|xss_clean');
						$this->form_validation->set_rules('alasan1_input', 'Alasan SIG Pilihan 1', 'trim|required|xss_clean');
						$this->form_validation->set_rules('sig2_input', 'SIG Pilihan 2', 'trim|required|xss_clean');
						$this->form_validation->set_rules('alasan2_input', 'Alasan SIG Pilihan 2', 'trim|required|xss_clean');

						$this->form_validation->set_message('required', '%s is required');
						$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

						$sig_arr = array('cp', 'ds', 'es', 'ns', 'gd', 'md', 'ux', 'wb', 'pr', 'hr');

						# run form validation
						if (!($this->form_validation->run())) {
							# if form input invalid							
							# get back to form													
							$data['title'] = 'Registration Form';
							$this->render('form', $data);
						} else if (!(in_array($this->input->post('sig1_input'), $sig_arr)) | !(in_array($this->input->post('sig2_input'), $sig_arr))) {
							# if form input invalid							
							# get back to form													
							$data['title'] = 'Registration Form';
							$this->render('form', $data);
						} else {
							# if form valid							

							# submit form to database through model
							# submit update biodata							
							$biodata_arr = array(
									'timestamp' => date('Y-m-d H:i:s'),									
									'email' => $this->input->post('email_input'),
									'phone' => $this->input->post('phone_input')
								);
							$this->biodata->update($user['username'], $biodata_arr);

							# submit update pilihan
							$pilihan_arr = array(
									'sig1' => $this->input->post('sig1_input'),
									'alasan1' => $this->input->post('alasan1_input'),
									'sig2' => $this->input->post('sig2_input'),
									'alasan2' => $this->input->post('alasan2_input'),
								);
							$this->pilihan->update($user['username'], $pilihan_arr);

							# direct to dashboard
							redirect(site_url('dashboard'));
						}			
					}
				} else {
					// render form.php
					$data['title'] = 'Registration Form';
					$this->render('form', $data);
				}
			} else {
				// user registered
				// redirect to dashboard
				redirect(site_url('dashboard'));
			}				
		}						
	}	
}