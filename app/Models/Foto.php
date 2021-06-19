<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $table = "foto";
    protected $fillable = [
        'user_id',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
    ];

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
