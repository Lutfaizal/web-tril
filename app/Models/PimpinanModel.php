<?php

namespace App\Models;

use CodeIgniter\Model;

class PimpinanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_pimpinan';
    protected $primaryKey       = 'id_pimpinan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_pimpinan',
        'gambar',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
