<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoBackground extends Model
{
    use HasFactory;

    protected $table = 'photo_backgrounds';

    protected $fillable = [
        'user_id',
        'judul',
        'keterangan',
        'gambar',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
