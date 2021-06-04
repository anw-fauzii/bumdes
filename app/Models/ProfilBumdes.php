<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilBumdes extends Model
{
    use HasFactory;
    protected $table ="profil_bumdes";
    protected $fillable =[
        'nama', 
        'kabupaten_id',
        'kecamatan_id',
        'alamat',
        'desa',
        'telepon',
        'lat',
        'long'
    ];
    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }

    public function jenis(){
        return $this->belongsToMany(JenisUsaha::class);
    }
}
