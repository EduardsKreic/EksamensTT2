<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'specialization',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classSessions()
    {
        return $this->hasMany(ClassSession::class);
    }
}