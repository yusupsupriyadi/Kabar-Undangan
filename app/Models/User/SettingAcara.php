<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingAcara extends Model
{
    use HasFactory;

    protected $table = 'setting_acaras';

    protected $fillable = [
        'user_id',
        'zona_waktu',
        'agama',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
