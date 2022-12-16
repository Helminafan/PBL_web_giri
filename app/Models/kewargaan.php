<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kewargaan extends Model
{
    use HasFactory;
    protected $table = 'kewargaan';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id_lurah',
        'kelurahan',
        'username',
        'password',
    ];
}
