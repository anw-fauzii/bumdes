<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = "kecamatan";
    protected $fillable = [
        'kabupaten_id', 'nama', 'lat', 'long'
    ];

    public function bumdes(){
        return $this->hasMany(ProfilBumdes::class,'kecamatan_id', 'id');
    }
}
