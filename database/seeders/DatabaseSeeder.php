<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
// Models
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => Hash::make('adminadmin'),
            'role' => 'admin',
            'avatar' => 'https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg'
        ]);
        User::factory()->create([
            'name' => 'moderator',
            'email' => 'moder@moder',
            'password' => Hash::make('moderator'),
            'role' => 'moderator',
            'avatar' => 'https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg'
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@user',
            'password' => Hash::make('useruser'),
            'role' => 'user',
            'avatar' => 'https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg'
        ]);
    }
}
