<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KadoNikah extends Model
{
    use HasFactory;

    protected $table = 'kado_nikahs';

    protected $fillable = [
        'user_id',
        'type',
        'wallet',
        'no_wallet',
        'user_wallet',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
