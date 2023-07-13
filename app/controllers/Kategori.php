<?php

class Kategori extends Controller {
	public function index()
	{
		$data['title'] = 'Data Kategori';
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('kategori/index', $data);
		$this->view('templates/footer');
	}
}