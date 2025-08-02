<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],  // إيميل الأدمن
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin123456'), // كلمة مرور الأدمن
                'role' => 'admin',  // تأكد ان حقل role موجود في جدول users
            ]
        );
    }
}
