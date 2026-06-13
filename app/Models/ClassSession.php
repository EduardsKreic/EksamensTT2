<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassSession extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'trainer_id',
        'category_id',
        'schedule_id',
        'price',
        'status',
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

    public function activeBookings()
    {
        return $this->hasMany(Booking::class)->where('status', 'active');
    }

    public function availablePlaces(): int
    {
        if (!$this->schedule) {
            return 0;
        }

        return max(0, $this->schedule->max_participants - $this->activeBookings()->count());
    }
}
