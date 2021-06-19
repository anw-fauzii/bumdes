<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shu extends Model
{
    use HasFactory;
    protected $table = "shu";
    protected $fillable = [
        'user_id',
        'nilai',
        'status',
        'tanggal',
        'keterangan'
    ];

    public function bumdes(){
        return $this->belongsTo(ProfilBumdes::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
