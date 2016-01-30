<?php

// SSO library
require_once(__DIR__.'/../../vendor/SSO/SSO/SSO.php');
use SSO\SSO;
SSO::setCASPath(__DIR__.'/../../vendor/CAS/CAS.php');

Class Ssologin extends MY_Controller {
	
	public function __construct() {
		parent::__construct();		
	}

	public function index() {		

		if(!SSO::check()) SSO::authenticate();

		$user = SSO::getUser();
		$userdata = array(
				'username' 				=> $user->username,
				'name' 					=> $user->name,
				'npm' 					=> $user->npm,
				'angkatan'				=> $this->parseTahunAngkatan($user->npm),							
				'jurusan' 				=> $user->study_program,
				'biohash'				=> $this->hashingBio($user->username, $user->npm)
			);

		// 2012-- & the other is not allowed, redirect to index
		// if( 
		// 	( 
		// 		($userdata['angkatan'] != '2013') & ($userdata['angkatan'] != '2014') & ($userdata['angkatan'] != '2015') 
		// 	) 
		// 	| 
		// 	($user->faculty != 'ILMU KOMPUTER') 
		// ) 
		// {
		// 	redirect(site_url());
		// }
		$angkatan_arr = array('130', '140', '150');
		$angkatan = substr($user->npm, 0, 2);
		
		if(!(in_array($angkatan, $angkatan_arr)) | ($user->faculty != 'ILMU KOMPUTER')) redirect(site_url());

		// re-set session
		$this->session->unset_userdata('userdata');
		$this->session->set_userdata('userdata', $userdata);

		// check if user is admin
		if ($this->useradmin->isAdmin($user->username)) {
			// redirect to admin747835
			redirect(site_url('admin747835'));
		} 

		// check if user exist or not
		if ($this->biodata->isUserRegistered($user->username)) {
			// user exist
			// redirect to dashboard
			redirect(site_url('dashboard'));
		} else {
			// user not exist
			// create initial data in database
			if(!($this->biodata->get($user->username))) $this->saveUserDataToDatabase($userdata);
			// redirect to form
			redirect(site_url('register'));
		}		
	}

	private function hashingBio($username, $npm) {
		return md5($username.$npm);
	}

	private function parseTahunAngkatan($npm) {
		// load helper
		$this->load->helper('text');

		// parsing char
		$parsed = substr($npm, 0, 2);
		$tahun = '20'.$parsed;
		return $tahun;
	}

	private function saveUserDataToDatabase($userdata) {
		$user_arr = array(
				'username' 				=> $userdata['username'],
				'name' 					=> $userdata['name'],
				'npm' 					=> $userdata['npm'],
				'angkatan'				=> $userdata['angkatan'],
				'jurusan' 				=> $userdata['jurusan'],
			);

		// create initial biodata record
		$this->biodata->create($user_arr);

		// create initial tugas record
		$this->tugas->create(array('username' => $userdata['username']));

		// create initial pilihan record
		$this->pilihan->create(array('username' => $userdata['username']));

		// create initial kualifikasi record
		$this->kualifikasi->create(array('username' => $userdata['username'], 'biohash' => $userdata['biohash']));
	}
}