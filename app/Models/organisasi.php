<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organisasi extends Model
{
    use HasFactory;
    protected $table = 'table_organisasi';

    protected $fillable = [
        'nama_organisasi',
        'alamat',
        'telp',
        'email',

    ];
}
