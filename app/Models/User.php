<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\User\CeritaCinta;
use App\Models\User\Gallery;
use App\Models\User\KadoNikah;
use App\Models\User\MempelaiPria;
use App\Models\User\MempelaiWanita;
use App\Models\User\MusicBackground;
use App\Models\User\PhotoBackground;
use App\Models\User\SettingAcara;
use App\Models\User\SettingAkad;
use App\Models\User\SettingResepsi;
use App\Models\User\SettingUndangan;
use App\Models\User\Tema;
use App\Models\User\Ucapan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'role',
        'vip',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function MempelaiPriaApi()
    {
        return $this->hasOne(MempelaiPria::class);
    }

    public function mempelaiWanitaApi()
    {
        return $this->hasOne(MempelaiWanita::class);
    }

    public function settingUndanganApi()
    {
        return $this->hasOne(SettingUndangan::class);
    }

    public function settingAcaraApi()
    {
        return $this->hasOne(SettingAcara::class);
    }

    public function settingAkadApi()
    {
        return $this->hasOne(SettingAkad::class);
    }

    public function settingResepsiApi()
    {
        return $this->hasOne(SettingResepsi::class);
    }

    public function ceritaCintaApi()
    {
        return $this->hasMany(CeritaCinta::class);
    }

    public function galleryApi()
    {
        return $this->hasMany(Gallery::class);
    }

    public function photoBackgroundApi()
    {
        return $this->hasMany(PhotoBackground::class);
    }

    public function musicBackgroundApi()
    {
        return $this->hasOne(MusicBackground::class);
    }

    public function kadoNikahApi()
    {
        return $this->hasMany(KadoNikah::class);
    }

    public function ucapanApi()
    {
        return $this->hasMany(Ucapan::class);
    }

    public function temaApi()
    {
        return $this->hasOne(Tema::class);
    }
}
