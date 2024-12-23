<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = "detail_layanan";
    protected $primaryKey = 'id_layanan';
    protected $fillable = [
        
        'id_kategori',
        'id_spesialisasi',
        'nama_layanan',
        'harga',
        'url'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_layanan');
    }
}
