<?php

namespace App\Models;

use CodeIgniter\Model;

class UsModel extends Model
{
    protected $table          = 'users';
    protected $primaryKey     = 'id';
    protected $allowedFields  = [
        'email',
        'username',
        'fullname',
        'user_image',
        'password_hash',
        'reset_hash',
        'reset_at',
        'reset_expires',
        'activate_hash',
        'status',
        'status_message',
        'active',
        'created_at',
        'force_pass_reset',
        'permissions',
        'deleted_at',
    ];

    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
