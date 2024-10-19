<?php

namespace App\Models;

use CodeIgniter\Model;

class layananModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_layanan';
    protected $primaryKey       = 'id_layanan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_layanan', 'link'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
