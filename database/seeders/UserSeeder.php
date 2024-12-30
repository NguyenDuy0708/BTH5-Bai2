<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $staffMembers = Staff::all();

        User::factory()->count(5)->create([
            'staff_id' => function () use (&$staffMembers) {
                $staff = $staffMembers->shift();
                return $staff->id;
            },
            'role' => 'staff',
            'password' => Hash::make('password'), 
        ]);
    
    
    }
}
