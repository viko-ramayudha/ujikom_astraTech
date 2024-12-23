<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori_layanan'; // Assuming your table name is 'kategori_detail'

    // Assuming 'id_kategori' is the primary key, if not adjust accordingly
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        
        'nama_kategori',
        'deskripsi',
        'url'
    ];


    // Assuming no timestamps are needed, if needed adjust accordingly
    public $timestamps = false;
}
