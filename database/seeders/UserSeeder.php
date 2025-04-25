<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
        'name' => 'Admin User',                    // اسم المستخدم
        'email' => 'admin@example.com',             // البريد الإلكتروني
        'mobileno' => '1234567890',                 // رقم الهاتف
        'profile_picture' => 'path/to/profile_picture.jpg', // مسار الصورة الشخصية
        'city' => 'Damascus',                      // المدينة
        'country' => 'Syria',                      // الدولة
        'role' => 'admin',                         // دور المستخدم (إداري)
        'password' => Hash::make('admin123'),
       ]);
    }
}
