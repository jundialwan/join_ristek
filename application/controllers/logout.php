<?php 

// SSO library
require_once(__DIR__.'/../../vendor/SSO/SSO/SSO.php');
use SSO\SSO;
SSO::setCASPath(__DIR__.'/../../vendor/CAS/CAS.php');

class Logout extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {	
		if (!$this->is_logged_in()) {
			redirect(site_url());
		} else {
			# unset session data
			$this->session->userdata = array();

			# logout SSO
			SSO::logout();			
		}
	}
}