<?php 
	function getColumn($table,$array)
	{
		$ci =& get_instance();
		return $ci->db->get_where($table,$array)->row();
	}

	function status_ruang($status)
	{
		switch ($status) {
			case 'dipakai':
				// code...
				return 'Sedang Dipakai';
				break;
			
			default:
				// code...
				return ' Tidak Dipakai';
				break;
		}
	}

	function tanggal_indo($tanggal, $cetak_hari = false){
	  $hari = array ( 1 =>    'Senin',
	        'Selasa',
	        'Rabu',
	        'Kamis',
	        'Jumat',
	        'Sabtu',
	        'Minggu'
	      );
	      
	  $bulan = array (1 =>   'Januari',
	        'Februari',
	        'Maret',
	        'April',
	        'Mei',
	        'Juni',
	        'Juli',
	        'Agustus',
	        'September',
	        'Oktober',
	        'November',
	        'Desember'
	      );
	  $split    = explode('-', $tanggal);
	  $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	  
	  if ($cetak_hari) {
	    $num = date('N', strtotime($tanggal));
	    return $hari[$num] . ', ' . $tgl_indo;
	  }
	  return $tgl_indo;
	}
	function set_active_admin($uri)
{
	$CI =& get_instance();
	return $CI->uri->segment(1)==$uri?'active':'';
}

 ?>