<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenissurat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','nama_surat', 'isi_surat',    ];
}
