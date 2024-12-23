<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";
    protected $primaryKey = 'id_trx';
    protected $fillable = [
        
        'tgl_trx',
        'id_layanan',
        'id_user',
        'username',
        'id_userr',
        'tgl_janjian',
        'total_hrg',
        'updated_at',
        'created_at'
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }
}
