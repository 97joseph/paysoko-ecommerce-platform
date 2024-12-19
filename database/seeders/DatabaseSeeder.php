<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'first_name' => 'kibira',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
            'admin' => 1
        ]);

        User::create([
            'first_name' => 'joseph',
            'last_name' => 'kibira',
            'email' => 'kibira@gmail.com',
            'password' => Hash::make('kibira123'),
            'email_verified_at' => now(),
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
