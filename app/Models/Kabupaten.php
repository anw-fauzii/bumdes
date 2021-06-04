<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    protected $table = "kabupaten";
    protected $fillable = [
        'nama','lat','long'
    ];

    public function bumdes(){
        return $this->hasMany(ProfilBumdes::class,'kabupaten_id', 'id');
    }
}
