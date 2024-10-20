<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisPkmModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_jenis_pkm';
    protected $primaryKey       = 'id_jenis';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_jenis'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
