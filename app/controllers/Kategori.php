<?php

class Kategori extends Controller {
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
		$data['title'] = 'Data Kategori';
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('kategori/index', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Kategori';
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('kategori/create', $data);
		$this->view('templates/footer');
	}

	public function SimpanKategori()
	{
		if ($this->model('KategoriModel')->tambahKategori($_POST) > 0 ) {
			Flasher::setMessage('Berhasil', 'ditambahkan', 'Success');
			header('location:'. base_url . '/Kategori');
			exit;
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location:'. base_url . '/Kategori');
			exit;
		}
	}

	public function edit($id)
	{
		try {
			$data['title'] = 'Detail Kategori';
			$data['kategori'] = $this->model('KategoriModel')->getKategoriById($id);
			$this->view('templates/header', $data);
			$this->view('templates/sidebar', $data);
			$this->view('kategori/edit', $data);
			$this->view('templates/footer');
		
		} catch (\Throwable $th) {
			var_dump($th->getMessage());
			die;
		}
	}

	public function updateKategori()
	{
		if($this->model('KategoriModel')->updateDataKategori($_POST) > 0 )
		{
			Flasher::setMessage('Berhasil', 'diupdate','success');
			header('location:'. base_url . '/Kategori');
			exit;
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location:'. base_url . '/Kategori');
			exit;
		}
	}
	public function hapus($id)
	{
		if($this->model('KategoriModel')->deleteKategori($id) > 0)
		{
			Flasher::setMessage('Berhasil', 'dihapus','success');
			header('location:'. base_url . '/Kategori');
			exit;
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location:'. base_url . '/Kategori');
			exit;
		}
	}

	public function cari()
	{
		$data['title'] = 'Data Kategori';
		$data['kategori'] = $this->model('KategoriModel')->cariKategori();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('kategori/index', $data);
		$this->view('templates/footer');
	}

}