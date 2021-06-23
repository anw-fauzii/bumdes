<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilBumdes extends Model
{
    use HasFactory;
    protected $table ="bumdes";
    protected $fillable =[
        'user_id',
        'rtrw',
        'dusun',
        'desa',
        'kecamatan_id',
        'kabupaten_id',
        'perdes',
        'tahun',
        'lat',
        'long',
        'kontak',
        'ketua',
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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function shu(){
        return $this->belongsTo(Shu::class);
    }
}
