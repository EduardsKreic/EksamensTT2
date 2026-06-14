<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'trainer_id',
        'category_id',
        'schedule_id',
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}