<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'option'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function hasUserVoted($userId)
    {
        return static::where('user_id', $userId)->exists();
    }
}