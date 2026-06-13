<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'class_date',
        'start_time',
        'end_time',
        'hall',
        'max_participants',
    ];

    protected $casts = [
        'class_date' => 'date',
    ];

    public function classSessions()
    {
        return $this->hasMany(ClassSession::class);
    }
}
