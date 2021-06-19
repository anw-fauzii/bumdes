<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUsaha extends Model
{
    use HasFactory;
    protected $table = "jenis_usaha";
    protected $fillable = [
        'user_id',
        'nama_jenis_usaha'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
