<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ucapan extends Model
{
    use HasFactory;

    protected $table = 'ucapans';

    protected $fillable = [
        'user_id',
        'nama',
        'instagram',
        'foto',
        'pesan',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
