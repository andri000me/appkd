<?php

class Api extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('android_api');
		$this->load->library('utils');
	}

	function xx(){
		$this->utils->pushNotif('2');
	}

	function login_android(){
		$response = array("error" => FALSE);
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array (
			'nama' => $username,
			'password' => md5($password)
		);
		$cek = $this->android_api->cek_login("penanggung_jawab", $where);
		if($cek){
			$response["error"] = FALSE;
	        $response["user"]["id"] = $cek["id"];
	        $response["user"]["jabatan"] = $cek["jabatan"];
	        // $response["user"]["nama"] = $cek["nama"];
	        // $response["user"]["level"] = $cek["level"];
	        // $response["user"]["username"] = $cek["username"];
		
	        // $response["user"]["email"] = $user["email"];
		}else{
			$response["error"] = TRUE;
	        $response["error_msg"] = "Login gagal. Password/Email salah";
		}

		header('Content-Type: application/json');
	    echo json_encode($response,JSON_PRETTY_PRINT);
	}

	public function peminjaman_ruang($keterangan){
		$tanggal = date("Y-m-d");
		$data = $this->android_api->show_pj_ruang($tanggal,$keterangan);
		$resp = array();
		if(count($data)>0){
			foreach ($data as $api) {
				$tanggal = $this->utils->tanggal_indo($api->tanggal_peminjaman);
				$resp[] = array(
					'id' => $api->id,
					'no_surat' => $api->no_surat,
					'acara' => $api->acara,
					'nama_ruang' => $api->nama_ruang,
					'tanggal_peminjaman' => $tanggal,
					// 'waktu' => $api->waktu,
					'waktu' => $api->jam.' WIB',
					'jumlah_peserta' => $api->jumlah_peserta,
					'status' => $api->status,
					'nama_peminjam' => $api->nama_peminjam,
					'foto_kesiapan' => $api->foto_kesiapan,
					'penanggung_jawab_id' => $api->penanggung_jawab_id
				);
			}
		}
		
		header('Content-Type: application/json');
		echo json_encode($resp, JSON_PRETTY_PRINT);
	}

	public function peminjaman_alat($keterangan){
		$tanggal = date("Y-m-d");

		$data = $this->android_api->show_pj_alat($tanggal,$keterangan);
		$resp = array();
		if(count($data)>0){
			foreach ($data as $api) {
				$tanggal = $this->utils->tanggal_indo($api->tanggal_peminjaman);
				$resp[] = array(
					'id' => $api->id,
					'nama_perlengkapan' => $api->nama_perlengkapan,
					'jumlah' => $api->jumlah,
					'nama_ruang' => $api->nama_ruang,
					'tanggal_peminjaman' => $tanggal,
					'jam' => $api->jam,
					'no_surat'=>$api->no_surat,
					'peminjaman_id' => $api->peminjaman_id,
					'jumlah_peserta' => $api->jumlah_peserta,
					'status' => $api->status,
					'nama_peminjam' => $api->nama_peminjam,
					// 'foto_kesiapan' => $api->foto_kesiapan,
					'foto_kesiapan' => "",
					'penanggung_jawab_id' => $api->penanggung_jawab_id,
					'acara' => $api->acara
				);
			}
		}
		header('Content-Type: application/json');
		echo json_encode($resp, JSON_PRETTY_PRINT);
	}

	public function detail_pinjam_ruang(){
		$id = $this->input->post('id');

		$response = array("error" => FALSE);
		$cek = $this->android_api->detail_pinjam_ruang($id);
		// $cek = $this->android_api->detail_pinjam_ruang('1528030189');
		$tanggal = $this->utils->tanggal_indo($cek["tanggal_peminjaman"],true);

		$response["error"] = FALSE;
        $response["data"]["no_surat"] = $cek["no_surat"];
        $response["data"]["acara"] = $cek["acara"];
        $response["data"]["nama_ruang"] = $cek["nama_ruang"];
        $response["data"]["tanggal"] = $tanggal;
        // $response["data"]["waktu"] = $cek["waktu"];
        $response["data"]["waktu"] = '08.00 WIB';
        $response["data"]["jumlah_peserta"] = $cek["jumlah_peserta"];
        $response["data"]["nama_peminjam"] = $cek["nama_peminjam"];
        $response["data"]["status"] = $cek["status"];
        $response["data"]["foto_kesiapan"] = $cek["foto_kesiapan"];

		header('Content-Type: application/json');
	    echo json_encode($response,JSON_PRETTY_PRINT);
	}

	public function peminjaman_kendaraan($keterangan){
		$tanggal = date("Y-m-d");
		$data = $this->android_api->show_pj_kendaraan($tanggal,$keterangan);
		$resp = array();
		if(count($data)>0){
			foreach ($data as $api) {
				$tanggal = $this->utils->tanggal_indo($api->tanggal_peminjaman);
				$tanggal_selesai =$this->utils->tanggal_indo($api->tanggal_selesai);
				$resp[] = array(
					'id' => $api->id,
					'no_surat' => $api->no_surat,
					'acara' => $api->acara,
					'tanggal_selesai' => $tanggal_selesai,
					'tanggal_peminjaman' => $tanggal,
					'jumlah_peserta' => $api->jumlah_peserta,
					'status' => $api->status,
					'nama_peminjam' => $api->nama_peminjam,
					'foto_kesiapan' => $api->foto_kesiapan,
					'penanggung_jawab_id' => $api->penanggung_jawab_id,
					'merk' => $api->merk,
					'nopol' => $api->nopol
				);
			}
		}
		
		header('Content-Type: application/json');
		echo json_encode($resp, JSON_PRETTY_PRINT);
	}

	public function detail_pinjam_kendaraan(){
		$id = $this->input->post('id');

		$response = array("error" => FALSE);
		$cek = $this->android_api->detail_pinjam_kendaraan($id);
		// $cek = $this->android_api->detail_pinjam_ruang('1527476315');
		$tanggal = $this->utils->tanggal_indo($cek["tanggal_peminjaman"],true);
		$tanggal_selesai = $this->utils->tanggal_indo($cek["tanggal_selesai"], true);

		$response["error"] = FALSE;
        $response["data"]["id"] = $cek["id"];
        $response["data"]["no_surat"] = $cek["no_surat"];
        $response["data"]["acara"] = $cek["acara"];
        $response["data"]["merk"] = $cek["merk"];
        $response["data"]["tanggal"] = $tanggal;
        $response["data"]["tanggal_selesai"] = $tanggal_selesai;

        $response["data"]["jumlah_peserta"] = $cek["jumlah_peserta"];
        $response["data"]["nama_peminjam"] = $cek["nama_peminjam"];
        $response["data"]["status"] = $cek["status"];
        $response["data"]["tempat"] = $cek["tempat"];
        $response["data"]["nopol"] = $cek["nopol"];
        $response["data"]["penanggung_jawab_id"] = $cek["penanggung_jawab_id"];
        $response["data"]["foto_kesiapan"] = $cek["foto_kesiapan"];

		header('Content-Type: application/json');
	    echo json_encode($response,JSON_PRETTY_PRINT);
	}

	public function detail_pinjam_alat(){
		$id = $this->input->post('id');

		$response = array("error" => FALSE);
		$cek = $this->android_api->detail_pinjam_alat($id);
		// $cek = $this->android_api->detail_pinjam_ruang('1527476315');
		$tanggal = $this->utils->tanggal_indo($cek["tanggal_peminjaman"],true);

		$response["error"] = FALSE;
        $response["data"]["id"] = $cek["peminjaman_id"];
        $response["data"]["no_surat"] = $cek["no_surat"];
        $response["data"]["acara"] = $cek["acara"];
        $response["data"]["tanggal"] = $tanggal;
        $response["data"]["jumlah"] = $cek["jumlah"];
        $response["data"]["status"] = $cek["status"];
        $response["data"]["nama_ruang"] = $cek["nama_ruang"];
        $response["data"]["nama_perlengkapan"] = $cek["nama_perlengkapan"];
        $response["data"]["foto_kesiapan"] = $cek["foto_kesiapan"];

		header('Content-Type: application/json');
	    echo json_encode($response,JSON_PRETTY_PRINT);
	}

	

	public function peminjaman_siap(){
		$id_penanggungjawab = $this->input->post('id_penanggungjawab');
		$status = $this->input->post('status');
		if($this->input->post('jenis')=='ruang'){
			$data = $this->android_api->show_siap_ruang($status,$id_penanggungjawab);
		}else if($this->input->post('jenis')=='kendaraan'){
			$data = $this->android_api->show_siap_kendaraan($status,$id_penanggungjawab);
		}else{
			$data = $this->android_api->show_siap_alat($status,$id_penanggungjawab);
		}
		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}


	public function alat_by(){
		$id_peminjaman = $this->input->post('no_surat');
		$data = $this->android_api->show_alat_by($id_peminjaman);
		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function ruang(){
		$data = $this->android_api->show_ruang();
		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function kendaraan(){
		$data = $this->android_api->show_kendaraan();
		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function alat(){
		$data = $this->android_api->show_alat();
		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function upload_foto(){
		$action = $_POST['action'];
		$upload_dir = '/home/oix/public_html/inventori-pemkab/uploads/';
		$nama_file = strtolower(str_replace(' ', '', $action));

		$response = array("success" => FALSE);
		if(file_exists($upload_dir.'/'.$nama_file.'.jpg')){
			unlink($upload_dir.'/'.$nama_file.'.jpg');
		}
		// if($action == "multipart") {
		if ($_FILES["photo"]["error"] > 0) {
			$response["success"] = FALSE;
			$response["message"] = "Upload Failed";
		} else {
			$name_file=htmlspecialchars($_FILES['photo']['name']);

			if (@getimagesize($_FILES["photo"]["tmp_name"]) !== false) {

				move_uploaded_file($_FILES["photo"]["tmp_name"], "$upload_dir/$nama_file.jpg");

				$response["success"] = TRUE;
				$response["message"] = "Upload Successfull";
				$file = "$upload_dir/$nama_file.jpg";
				$resizedFile = "$upload_dir/$nama_file.jpg";
				$this->utils->smart_resize_image($file , null, 800 , 600 , false , $resizedFile , false , false ,100 );
			}else{
				$response["success"] = FALSE;
				$response["message"] = "Upload Failed";
			}

			echo json_encode($response);
		}
	}

	public function update_status(){
		$status = $this->input->post('status');
		$id = $this->input->post('id');
		$tabel = $this->input->post('tabel');
		$nama_file = $this->input->post('nama_file').'.jpg';
		$this->android_api->update_status($id,$status,$tabel,$nama_file);
		$response = array("error" => FALSE);
    	header('Content-type: application/json');
    	$json_string = json_encode($response, JSON_PRETTY_PRINT);
    	echo $json_string;
	}

	public function update_date(){

	}


}