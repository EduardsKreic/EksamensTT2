<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_date',
        'start_time',
        'end_time',
        'place',
        'available_places',
    ];

    public function classSessions()
    {
        return $this->hasMany(ClassSession::class);
    }
}