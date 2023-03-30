<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriPengeluaranModel extends Model
{
    protected $table = "tb_kategori_pengeluaran";
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori'];
}
