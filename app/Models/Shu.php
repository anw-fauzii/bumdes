<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shu extends Model
{
    use HasFactory;
    protected $table = "shu";
    protected $fillable = [
        'bumdes_id',
        'nilai',
        'tanggal'
    ];
}
