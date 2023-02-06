<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CeritaCinta extends Model
{
    use HasFactory;

    protected $table = 'cerita_cintas';

    protected $fillable = [
        'user_id',
        'judul',
        'cerita',
        'tanggal',
        'gambar',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
