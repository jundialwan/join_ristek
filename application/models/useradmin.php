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
		$sql = 'select * from biodata where angkatan= ? AND timestamp<>"NULL"';
		$total = $this->db->query('select * from biodata where timestamp<>"NULL"')->num_rows();
		$total2013 = $this->db->query($sql, array('2013'))->num_rows();
		$total2014 = $this->db->query($sql, array('2014'))->num_rows();
		$total2015 = $this->db->query($sql, array('2015'))->num_rows();

		$totalCP = $this->db->query('select * from pilihan where (sig1="cp" OR sig2="cp")')->num_rows();
		$totalCPboth = $this->db->query('select * from pilihan where (sig1="cp" AND sig2="cp")')->num_rows();
		$totalCPpil1 = $this->db->query('select * from pilihan where (sig1="cp" AND sig2<>"cp")')->num_rows();
		$totalCPpil2 = $this->db->query('select * from pilihan where (sig2="cp" AND sig1<>"cp")')->num_rows();
		$totalCP2013 = $this->db->query('select * from pilihan p, biodata b where ((p.sig1="cp" OR p.sig2="cp") AND b.angkatan="2013" AND p.username=b.username)')->num_rows();
		// $totalCP2014 = $this->db->query('select * from pilihan where ((sig1="cp" OR sig2="cp") AND angkatan="2014")')->num_rows();
		// $totalCP2015 = $this->db->query('select * from pilihan where ((sig1="cp" OR sig2="cp") AND angkatan="2015")')->num_rows();

		$totalDS = $this->db->query('select * from pilihan where (sig1="ds" OR sig2="ds")')->num_rows();
		$totalDSboth = $this->db->query('select * from pilihan where (sig1="ds" AND sig2="ds")')->num_rows();
		$totalDSpil1 = $this->db->query('select * from pilihan where (sig1="ds" AND sig2<>"ds")')->num_rows();
		$totalDSpil2 = $this->db->query('select * from pilihan where (sig2="ds" AND sig1<>"ds")')->num_rows();

		$totalES = $this->db->query('select * from pilihan where (sig1="es" OR sig2="es")')->num_rows();
		$totalESboth = $this->db->query('select * from pilihan where (sig1="es" AND sig2="es")')->num_rows();
		$totalESpil1 = $this->db->query('select * from pilihan where (sig1="es" AND sig2<>"es")')->num_rows();
		$totalESpil2 = $this->db->query('select * from pilihan where (sig2="es" AND sig1<>"es")')->num_rows();

		$totalNS = $this->db->query('select * from pilihan where (sig1="ns" OR sig2="ns")')->num_rows();
		$totalNSboth = $this->db->query('select * from pilihan where (sig1="ns" AND sig2="ns")')->num_rows();
		$totalNSpil1 = $this->db->query('select * from pilihan where (sig1="ns" AND sig2<>"ns")')->num_rows();
		$totalNSpil2 = $this->db->query('select * from pilihan where (sig2="ns" AND sig1<>"ns")')->num_rows();

		$totalGD = $this->db->query('select * from pilihan where (sig1="gd" OR sig2="gd")')->num_rows();
		$totalGDboth = $this->db->query('select * from pilihan where (sig1="gd" AND sig2="gd")')->num_rows();
		$totalGDpil1 = $this->db->query('select * from pilihan where (sig1="gd" AND sig2<>"gd")')->num_rows();
		$totalGDpil2 = $this->db->query('select * from pilihan where (sig2="gd" AND sig1<>"gd")')->num_rows();

		$totalMD = $this->db->query('select * from pilihan where (sig1="md" OR sig2="md")')->num_rows();
		$totalMDboth = $this->db->query('select * from pilihan where (sig1="md" AND sig2="md")')->num_rows();
		$totalMDpil1 = $this->db->query('select * from pilihan where (sig1="md" AND sig2<>"md")')->num_rows();
		$totalMDpil2 = $this->db->query('select * from pilihan where (sig2="md" AND sig1<>"md")')->num_rows();

		$totalUX = $this->db->query('select * from pilihan where (sig1="ux" OR sig2="ux")')->num_rows();
		$totalUXboth = $this->db->query('select * from pilihan where (sig1="ux" AND sig2="ux")')->num_rows();
		$totalUXpil1 = $this->db->query('select * from pilihan where (sig1="ux" AND sig2<>"ux")')->num_rows();
		$totalUXpil2 = $this->db->query('select * from pilihan where (sig2="ux" AND sig1<>"ux")')->num_rows();

		$totalWB = $this->db->query('select * from pilihan where (sig1="wb" OR sig2="wb")')->num_rows();
		$totalWBboth = $this->db->query('select * from pilihan where (sig1="wb" AND sig2="wb")')->num_rows();
		$totalWBpil1 = $this->db->query('select * from pilihan where (sig1="wb" AND sig2<>"wb")')->num_rows();
		$totalWBpil2 = $this->db->query('select * from pilihan where (sig2="wb" AND sig1<>"wb")')->num_rows();

		$totalHR = $this->db->query('select * from pilihan where (sig1="hr" OR sig2="hr")')->num_rows();
		$totalHRboth = $this->db->query('select * from pilihan where (sig1="hr" AND sig2="hr")')->num_rows();
		$totalHRpil1 = $this->db->query('select * from pilihan where (sig1="hr" AND sig2<>"hr")')->num_rows();
		$totalHRpil2 = $this->db->query('select * from pilihan where (sig2="hr" AND sig1<>"hr")')->num_rows();

		$totalPR = $this->db->query('select * from pilihan where (sig1="pr" OR sig2="pr")')->num_rows();
		$totalPRboth = $this->db->query('select * from pilihan where (sig1="pr" AND sig2="pr")')->num_rows();
		$totalPRpil1 = $this->db->query('select * from pilihan where (sig1="pr" AND sig2<>"pr")')->num_rows();
		$totalPRpil2 = $this->db->query('select * from pilihan where (sig2="pr" AND sig1<>"pr")')->num_rows();

		$pendaftar_stats_arr = array(
				'total' => $total,
				'total2013' => $total2013,
				'total2014' => $total2014,
				'total2015' => $total2015,

				'totalCP' => $totalCP,				
				'totalCPboth' => $totalCPboth,
				'totalCPpil1' => $totalCPpil1,
				'totalCPpil2' => $totalCPpil2,
				'totalCP2013' => $totalCP2013,
				// 'totalCP2014' => $totalCP2014,
				// 'totalCP2015' => $totalCP2015,

				'totalDS' => $totalDS,
				'totalDSboth' => $totalDSboth,
				'totalDSpil1' => $totalDSpil1,
				'totalDSpil2' => $totalDSpil2,

				'totalES' => $totalES,
				'totalESboth' => $totalESboth,
				'totalESpil1' => $totalESpil1,
				'totalESpil2' => $totalESpil2,

				'totalNS' => $totalNS,
				'totalNSboth' => $totalNSboth,
				'totalNSpil1' => $totalNSpil1,
				'totalNSpil2' => $totalNSpil2,

				'totalGD' => $totalGD,
				'totalGDboth' => $totalGDboth,
				'totalGDpil1' => $totalGDpil1,
				'totalGDpil2' => $totalGDpil2,

				'totalMD' => $totalMD,
				'totalMDboth' => $totalMDboth,
				'totalMDpil1' => $totalMDpil1,
				'totalMDpil2' => $totalMDpil2,

				'totalUX' => $totalUX,
				'totalUXboth' => $totalUXboth,
				'totalUXpil1' => $totalUXpil1,
				'totalUXpil2' => $totalUXpil2,

				'totalWB' => $totalWB,
				'totalWBboth' => $totalWBboth,
				'totalWBpil1' => $totalWBpil1,
				'totalWBpil2' => $totalWBpil2,

				'totalHR' => $totalHR,
				'totalHRboth' => $totalHRboth,
				'totalHRpil1' => $totalHRpil1,
				'totalHRpil2' => $totalHRpil2,

				'totalPR' => $totalPR,
				'totalPRboth' => $totalPRboth,
				'totalPRpil1' => $totalPRpil1,
				'totalPRpil2' => $totalPRpil2,
			);

		return $pendaftar_stats_arr;
	}	
}
