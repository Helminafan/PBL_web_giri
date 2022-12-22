<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warga extends Model
{
    use HasFactory;
    protected $table = 'warga';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'nama_warga',
        'alamat',
        'no_hp',
        'kelurahan',
        'foto_ktp',
        'nik'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_kelurahan', 'id');
    }
}
