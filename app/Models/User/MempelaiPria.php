<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MempelaiPria extends Model
{
    use HasFactory;

    protected $table = 'mempelai_pria';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nama_panggilan',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_ayah',
        'nama_ibu',
        'instagram',
        'foto',
        'tampilkan_foto',
        'facebook',
        'twitter',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
