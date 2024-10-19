<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_artikel';
    protected $primaryKey       = 'id_artikel';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user',

        'slug_artikel',
        'judul_artikel',
        'tanggal',
        'isi',
        'status_artikel',
        'gambar',
        'jenis_artikel',
        'ringkasan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function sidebar()
    {
        $query = $this->db->query("
        SELECT * FROM view_artikel WHERE view_artikel.jenis_artikel = 'Artikel' AND 
        view_artikel.status_artikel = 'Publish' order by id_artikel LIMIT 7");
        return $query->getResultObject();
    }
}
