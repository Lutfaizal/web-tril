<?php

namespace App\Models;

use CodeIgniter\Model;

class PublikasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_publikasi';
    protected $primaryKey       = 'id_publikasi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tim_pelaksana',
        'judul',
        'id_jenis',
        'tahun',
        'dokumen',
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
