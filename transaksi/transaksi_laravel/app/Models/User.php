<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use Notifiable;
    use HasFactory;
    protected $table = "user";
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'id_user',
        'username',
        'email',
        'password',
        'role',
        'id_spesialisasi'
    ];
}




// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class User extends Model
// {
//     use HasFactory;
//     protected $table = "user";
//     protected $primaryKey = 'id_user';
//     protected $fillable = [
//         'id_user',
//         'username',
//         'email',
//         'password',
//         'role',
//         'id_spesialisasi'
//     ];
// }

