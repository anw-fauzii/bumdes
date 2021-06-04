<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBumdes extends Model
{
    use HasFactory;
    protected $table = "bumdes_jenis";
    protected $fillable = [
        'jenis_id', 'bumdes_id'
    ];
}
