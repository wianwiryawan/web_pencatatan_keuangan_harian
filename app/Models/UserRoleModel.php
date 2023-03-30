<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRoleModel extends Model
{
    protected $table = "tb_user_role";
    protected $allowedFields = ['role_name'];
    protected $primaryKey = ['id_role'];
    protected $useTimestamps = true;
}
