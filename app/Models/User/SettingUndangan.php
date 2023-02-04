<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingUndangan extends Model
{
    use HasFactory;

    protected $table = 'setting_undangan';

    protected $fillable = [
        'user_id',
        'domain',
        'judul_undangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
