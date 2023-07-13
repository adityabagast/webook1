<?php

class KategoriModel {
	
	private $table = 'kategori';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllKategori()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getKategoriById($id)
	{
		
	}

	public function tambahKategori($data)
	{
		
	}

	public function updateDataKategori($data)
	{
		
	}

	public function deleteKategori($id)
	{
		
	}

	public function cariKategori()
	{

	}
}