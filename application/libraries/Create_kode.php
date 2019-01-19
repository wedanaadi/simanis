<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create_kode {
    var $CI = NULL;
    function __construct(){
        $this->ci =& get_instance();
    }

    function generate_menu($lastKode, $lenght, $start, $awalKode = NULL, $split = NULL) {
        $kode = substr($lastKode,$start,2);
		$angka = (int)$kode;
        $barang = $angka+1;
		$angka_baru = $awalKode.$split.str_repeat("0", $lenght - strlen($angka+1)).($angka+1)."808";
		return $angka_baru;
    }
}
?>