<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = "tb_produk";
    protected $allowedFields = ['nama_produk', 'garis_leher', 'motif', 'bahan', 'file_path'];
    protected $useTimestamps = true;
}
