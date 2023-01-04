<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wargakonoha extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','tanggal_konoha', 'keterangan', 'status_konoha'    ];
}
