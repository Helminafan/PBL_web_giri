<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id_kecamatan',
        'kecamatan',
        'alamat',
        'email',
    ];
}
