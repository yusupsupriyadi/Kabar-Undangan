<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    
    protected $table = 'temas';

    protected $fillable = [
        'user_id',
        'tema',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
