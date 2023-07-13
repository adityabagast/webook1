<?php

class Buku extends Controller {

	public function __construct()
{
	if ($_SESSION['session_login'] != 'sudah_login') {
		Flasher::setMessage('Login', 'Belum masuk.', 'danger');
		header('location:' . base_url . '/Login');
		exit;
	}
}

	public function index()
	{
		$data['title'] = 'Data Buku';
		$data['buku'] = $this->model('BukuModel')->getAllBuku();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('buku/index', $data);
		$this->view('templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Buku';
		$data['buku'] = $this->model('BukuModel')->cariBuku();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('buku/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Buku';
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$data['buku'] = $this->model('BukuModel')->getBukuById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('buku/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Buku';		
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('buku/create', $data);
		$this->view('templates/footer');
	}

	public function simpanBuku(){		

		if( $this->model('BukuModel')->tambahBuku($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/Buku');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/Buku');
			exit;	
		}
	}

	public function updateBuku(){	
		if( $this->model('BukuModel')->updateDataBuku($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/Buku');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/Buku');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('BukuModel')->deleteBuku($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/Buku');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/Buku');
			exit;	
		}
	}

}