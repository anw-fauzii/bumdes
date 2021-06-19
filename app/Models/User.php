<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'email',
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
        'logo',
        'ketua'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url'
    ];

    public function jenis(){
        return $this->hasMany(JenisUsaha::class);
    }

    public function foto(){
        return $this->hasMany(Foto::class);
    }

    public function shu(){
        return $this->hasMany(Shu::class);
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class);
    }
}
