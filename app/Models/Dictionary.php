<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;
    
    protected $table = 'dictionary';
    protected $fillable = ['word', 'isBlock'];

    public static function blockedWords()
    {
        return self::where('isBlock', true)->pluck('word')->toArray();
    }
}
