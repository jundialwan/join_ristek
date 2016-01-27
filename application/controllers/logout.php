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
			$this->unset_only();

			# logout SSO
			SSO::logout();			
		}
	}

	private function unset_only() {
	    $user_data = $this->session->all_userdata();

	    foreach ($user_data as $key => $value) {
	        if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
	            $this->session->unset_userdata($key);
	        }
	    }
	}
}