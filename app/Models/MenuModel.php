<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{

    public function profil()
    {
        $builder = $this->db->table('view_artikel');
        $builder->where('jenis_artikel', 'Profil');
        $builder->where('status_artikel', 'Publish');
        $builder->orderBy('id_artikel', 'ASC');
        $query = $builder->get();
        return $query->getResultObject();
    }

    public function akademik()
    {
        $builder = $this->db->table('view_artikel');
        $builder->where('jenis_artikel', 'Akademik');
        $builder->where('status_artikel', 'Publish');
        $builder->orderBy('Judul_artikel', 'ASC');
        $query = $builder->get();
        return $query->getResultObject();
    }

    public function dokumens()
    {
        $builder = $this->db->table('tbl_jenis_dokumen');
        $builder->orderBy('nama_jenis', 'ASC');
        $query = $builder->get();
        return $query->getResultObject();
    }

    public function artikel()
    {
        $builder = $this->db->table('view_artikel');
        $builder->where('jenis_artikel', 'Artikel');
        $builder->where('status_artikel', 'Publish');
        $builder->groupBy('id_kategori');
        $builder->orderBy('id_kategori', 'ASC');
        $query = $builder->get();
        return $query->getResultObject();
    }

    public function layanan()
    {
        $builder = $this->db->table('tbl_layanan');
        $builder->orderBy('nama_layanan', 'ASC');
        $query = $builder->get();
        return $query->getResultObject();
    }

    public function tampil_prodi()
    {
        $builder = $this->db->table('tbl_prodi');
        $builder->orderBy('id_prodi', 'DESC');
        $query = $builder->get();
        return $query->getResultObject();
    }
}
