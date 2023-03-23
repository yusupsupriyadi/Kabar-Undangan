<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicBackground extends Model
{
    use HasFactory;

    protected $table = 'music_backgrounds';

    protected $fillable = [
        'user_id',
        'music',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
