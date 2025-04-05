<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(MovieSeeder::class);  // Đảm bảo rằng nó đúng cú pháp như này
        
        if (!User::where('email', 'admin@corporateui.com')->exists()) {
            User::create([
                'name' => 'Alec Thompson',
                'email' => 'admin@corporateui.com',
                'password' => bcrypt('yourpassword'),
                'about' => 'Hi, I’m Alec Thompson...',
            ]);
        }
        
    }
}
