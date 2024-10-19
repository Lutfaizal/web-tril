<?php

namespace App\Models;

use CodeIgniter\Model;

class SambutanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_sambutan';
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
        'isi',
        'gambar',
        'tanggal',
        'jenis_artikel',
        'ringkasan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
