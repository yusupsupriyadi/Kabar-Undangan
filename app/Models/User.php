<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\User\CeritaCinta;
use App\Models\User\MempelaiPria;
use App\Models\User\MempelaiWanita;
use App\Models\User\SettingAcara;
use App\Models\User\SettingAkad;
use App\Models\User\SettingResepsi;
use App\Models\User\SettingUndangan;
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
        'vip'
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

    public function mempelai_pria()
    {
        return $this->hasOne(MempelaiPria::class);
    }

    public function mempelai_wanita()
    {
        return $this->hasOne(MempelaiWanita::class);
    }

    public function setting_undangan()
    {
        return $this->hasOne(SettingUndangan::class);
    }

    public function setting_acara()
    {
        return $this->hasOne(SettingAcara::class);
    }

    public function setting_akad()
    {
        return $this->hasOne(SettingAkad::class);
    }

    public function setting_resepsi()
    {
        return $this->hasOne(SettingResepsi::class);
    }

    public function ceritaCinta()
    {
        return $this->hasMany(CeritaCinta::class);
    }

}
