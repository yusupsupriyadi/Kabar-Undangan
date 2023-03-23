<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

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
