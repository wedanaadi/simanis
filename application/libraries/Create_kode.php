<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * 
 *
 * @author By Wedana Adi.
 */

class Create_kode {
    var $CI = NULL;
    function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->model('M_penerimaan'); 
    }

    function generate_menu($lastKode, $lenght, $start, $awalKode = NULL, $split = NULL) {
        $kode = substr($lastKode,$start);
		$angka = (int)$kode;
		$angka_baru = $awalKode.$split.str_repeat("0", $lenght - strlen($angka+1)).($angka+1);
		return $angka_baru;
    }
}
?>