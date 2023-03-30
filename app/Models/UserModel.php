<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "tb_user";
    protected $allowedFields = ['file_path', 'jenis_kelamin', 'nama', 'no_telp', 'username', 'password', 'role'];
    protected $useTimestamps = true;

    function getAll()
    {
        $builder = $this->db->table('tb_user');
        $builder->join('tb_user_role', 'tb_user_role.id_role = tb_user.role');
        $query = $builder->get();
        return $query->getResult();
    }

    function getId($id)
    {
        $builder = $this->db->table('tb_user');
        $builder->join('tb_user_role', 'tb_user_role.id_role = tb_user.role');
        $query = $builder->getWhere(['id' => $id]);
        return $query->getResult();
    }
}
