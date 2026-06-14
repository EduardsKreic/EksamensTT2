<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialization',
        'description',
    ];

    public function classSessions()
    {
        return $this->hasMany(ClassSession::class);
    }
}