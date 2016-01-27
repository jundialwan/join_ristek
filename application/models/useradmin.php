<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Useradmin extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function getAllPendaftar($sig) {
		$this->db->from('pilihan p');
		$this->db->join('tugas t', 't.username=p.username');
		$this->db->join('biodata b', 'b.username=p.username');
		$this->db->join('kualifikasi k', 'k.username=p.username');

		$where = '';
		if ($sig == 'cs') {
			$where = '(
				p.sig1="cp" or p.sig2="cp" or
				p.sig1="ds" or p.sig2="ds" or
				p.sig1="es" or p.sig2="es" or
				p.sig1="ns" or p.sig2="ns"				
			)';			
		} else if ($sig == 'dv') {
			$where = '(
				p.sig1="gd" or p.sig2="gd" or
				p.sig1="wb" or p.sig2="wb" or
				p.sig1="ux" or p.sig2="ux" or
				p.sig1="md" or p.sig2="md"
			)';			
		} else $where = '(p.sig1="'.$sig.'" or p.sig2="'.$sig.'")';

		if ($sig != 'sp') $this->db->where($where);

		$this->db->order_by('b.timestamp', 'asc');

		$result = $this->db->get()->result();

		return $result;
	}

	public function isAdmin($username) {
		$this->db->select('username');
		$this->db->where('username', $username);
		$result = $this->db->get('admin')->num_rows();		
		
		if ($result == 0) return false;
		else return true;
	}

	public function getAdmin($username) {
		$this->db->where('username', $username);
		$result = $this->db->get('admin')->row();

		return $result;
	}

	public function getPendaftarStats() {
		$sql = 'select * from biodata where angkatan= ?';
		$total = $this->db->get('biodata')->num_rows();
		$total2013 = $this->db->query($sql, array('2013'))->num_rows();
		$total2014 = $this->db->query($sql, array('2014'))->num_rows();
		$total2015 = $this->db->query($sql, array('2015'))->num_rows();
		$pendaftar_stats_arr = array(
				'total' => $total,
				'total2013' => $total2013,
				'total2014' => $total2014,
				'total2015' => $total2015
			);

		return $pendaftar_stats_arr;
	}	
}
