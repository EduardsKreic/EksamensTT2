<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Category;
use App\Models\ClassSession;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $adminRole = Role::where('name', 'admin')->first();
        $trainerRole = Role::where('name', 'trainer')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@sportclub.lv',
            'password' => bcrypt('password'),
            'role_id' => $adminRole->id,
        ]);

        $trainerUser = User::create([
            'name' => 'Trainer User',
            'email' => 'trainer@sportclub.lv',
            'password' => bcrypt('password'),
            'role_id' => $trainerRole->id,
        ]);

        $regularUser = User::create([
            'name' => 'Regular User',
            'email' => 'user@sportclub.lv',
            'password' => bcrypt('password'),
            'role_id' => $userRole->id,
        ]);

        $yoga = Category::create([
            'name' => 'Yoga',
            'description' => 'Relaxing yoga classes for flexibility and balance.',
        ]);

        $fitness = Category::create([
            'name' => 'Fitness',
            'description' => 'General fitness and strength training classes.',
        ]);

        $boxing = Category::create([
            'name' => 'Boxing',
            'description' => 'Boxing training for endurance and technique.',
        ]);

        $pilates = Category::create([
            'name' => 'Pilates',
            'description' => 'Pilates classes for posture and core strength.',
        ]);

        $tennis = Category::create([
            'name' => 'Tennis',
            'description' => 'Tennis practice sessions for beginners and advanced players.',
        ]);

        $trainer1 = Trainer::create([
            'name' => 'Anna Ozola',
            'specialization' => 'Yoga',
            'description' => 'Certified yoga instructor with 5 years of experience.',
        ]);

        $trainer2 = Trainer::create([
            'name' => 'John Smith',
            'specialization' => 'Fitness',
            'description' => 'Strength and conditioning coach.',
        ]);

        $trainer3 = Trainer::create([
            'name' => 'Mark Johnson',
            'specialization' => 'Boxing',
            'description' => 'Professional boxing coach.',
        ]);

        $trainer4 = Trainer::create([
            'name' => 'Laura Kalniņa',
            'specialization' => 'Pilates',
            'description' => 'Pilates instructor focused on mobility and core strength.',
        ]);

        $trainer5 = Trainer::create([
            'name' => 'Roberts Bērziņš',
            'specialization' => 'Tennis',
            'description' => 'Tennis coach for group and individual training.',
        ]);

        $schedule1 = Schedule::create([
            'class_date' => '2026-06-20',
            'start_time' => '18:00',
            'end_time' => '19:00',
            'place' => 'Hall A',
            'available_places' => 20,
        ]);

        $schedule2 = Schedule::create([
            'class_date' => '2026-06-21',
            'start_time' => '10:00',
            'end_time' => '11:00',
            'place' => 'Hall B',
            'available_places' => 15,
        ]);

        $schedule3 = Schedule::create([
            'class_date' => '2026-06-22',
            'start_time' => '17:30',
            'end_time' => '18:30',
            'place' => 'Boxing Room',
            'available_places' => 12,
        ]);

        $schedule4 = Schedule::create([
            'class_date' => '2026-06-23',
            'start_time' => '19:00',
            'end_time' => '20:00',
            'place' => 'Hall C',
            'available_places' => 18,
        ]);

        $schedule5 = Schedule::create([
            'class_date' => '2026-06-24',
            'start_time' => '16:00',
            'end_time' => '17:30',
            'place' => 'Tennis Court 1',
            'available_places' => 8,
        ]);

        $class1 = ClassSession::create([
            'title' => 'Evening Yoga',
            'description' => 'Relaxing evening yoga session.',
            'trainer_id' => $trainer1->id,
            'category_id' => $yoga->id,
            'schedule_id' => $schedule1->id,
        ]);

        $class2 = ClassSession::create([
            'title' => 'Morning Fitness',
            'description' => 'Full body morning workout.',
            'trainer_id' => $trainer2->id,
            'category_id' => $fitness->id,
            'schedule_id' => $schedule2->id,
        ]);

        $class3 = ClassSession::create([
            'title' => 'Boxing Basics',
            'description' => 'Introduction to boxing technique.',
            'trainer_id' => $trainer3->id,
            'category_id' => $boxing->id,
            'schedule_id' => $schedule3->id,
        ]);

        $class4 = ClassSession::create([
            'title' => 'Pilates Core',
            'description' => 'Core strength and posture training.',
            'trainer_id' => $trainer4->id,
            'category_id' => $pilates->id,
            'schedule_id' => $schedule4->id,
        ]);

        $class5 = ClassSession::create([
            'title' => 'Tennis Group Training',
            'description' => 'Group tennis training session.',
            'trainer_id' => $trainer5->id,
            'category_id' => $tennis->id,
            'schedule_id' => $schedule5->id,
        ]);

        Booking::create([
            'user_id' => $regularUser->id,
            'class_session_id' => $class1->id,
            'status' => 'active',
        ]);

        Booking::create([
            'user_id' => $regularUser->id,
            'class_session_id' => $class2->id,
            'status' => 'active',
        ]);

        Booking::create([
            'user_id' => $trainerUser->id,
            'class_session_id' => $class3->id,
            'status' => 'cancelled',
        ]);
    }
}