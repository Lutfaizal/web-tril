<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'auth_groups_users';
    protected $allowedFields    = ['group_id', 'user_id'];
}
