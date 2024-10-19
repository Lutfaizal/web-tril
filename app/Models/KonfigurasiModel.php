<?php

namespace App\Models;

use CodeIgniter\Model;

class KonfigurasiModel extends Model
{

    public function show_data()
    {
        $query = $this->db->query("SELECT * FROM tbl_konfigurasi");
        return $query->getRowArray();
    }
    public function show_sambutan()
    {
        $query = $this->db->query("SELECT * FROM view_sambutan");
        return $query->getRowArray();
    }

    public function hero()
    {
        $query = $this->db->query("SELECT * FROM tbl_slide order by id_slide asc");
        return $query->getResultObject();
    }

    public function pimpinan()
    {
        $query = $this->db->query("SELECT * FROM tbl_pimpinan order by id_pimpinan asc LIMIT 4");
        return $query->getResultObject();
    }
    public function fakultas()
    {
        $query = $this->db->query("SELECT * FROM tbl_fakultas order by id_fakultas asc");
        return $query->getResultObject();
    }
    public function prodi()
    {
        $query = $this->db->query("SELECT * FROM tbl_prodi order by id_prodi asc");
        return $query->getResultObject();
    }
    public function galeri()
    {
        $query = $this->db->query("SELECT * FROM tbl_galeri order by id_galeri desc  LIMIT 3");
        return $query->getResultObject();
    }
    public function list_berita()
    {
        $query = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Berita' AND 
        view_artikel.status_artikel = 'Publish' order by id_artikel desc LIMIT 3");
        return $query->getResultObject();
    }

    public function list_pengumuman()
    {
        $query = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Pengumuman' AND 
        view_artikel.status_artikel = 'Publish' order by id_artikel desc LIMIT 3");
        return $query->getResultObject();
    }

    public function list_agenda()
    {
        $query = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Agenda' AND 
        view_artikel.status_artikel = 'Publish' order by id_artikel desc LIMIT 3");
        return $query->getResultObject();
    }
    public function list_karir()
    {
        $query = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Karir' AND 
        view_artikel.status_artikel = 'Publish' order by id_artikel desc LIMIT 3");
        return $query->getResultObject();
    }
}
