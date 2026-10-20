<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primarykey = 'pelanggan-id';
    protected $fillable = [
        'first-name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone',
    ];
}
