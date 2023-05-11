<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $users = collect([
            [
                'name' => 'Aero',
                'email' => 'aero@example.com',
                'password' => Hash::make('test123'),
                'company_name' => 'Aero Contractors',
                'username' => 'aero',
                'config_data' => [
                    'page_title' => 'Welcome to Aero Contractors',
                    'sub_page_title' => 'The reliable way to fly',
                    'logo' => 'aero.png',
                ]
            ],
            [
                'name' => 'AirPeace Admin',
                'email' => 'airpeace@example.com',
                'password' => Hash::make('test123'),
                'company_name' => 'AirPeace Limited',
                'username' => 'airpeace',
                'config_data' => [
                    'page_title' => 'Welcome to Airpeace Airline',
                    'sub_page_title' => 'Your peace our peace!',
                    'logo' => 'airpeace.png',
                ]
            ],
            [
                'name' => 'Dana Admin',
                'email' => 'dana@example.com',
                'password' => Hash::make('test123'),
                'company_name' => 'Dana Air',
                'username' => 'dana',
                'config_data' => [
                    'page_title' => 'Welcome to Dana Air',
                    'sub_page_title' => 'Your best way to fly',
                    'logo' => 'dana.png',
                ]
            ],
            [
                'name' => 'Max Admin',
                'email' => 'maxair@example.com',
                'password' => Hash::make('test123'),
                'company_name' => 'Max Air',
                'username' => 'maxair',
                'config_data' => [
                    'page_title' => 'Welcome to Max Air Limited',
                    'sub_page_title' => 'Your wings to fly',
                    'logo' => 'maxair.png',
                ]
            ],
            [
                'name' => 'Rano Admin',
                'email' => 'rano@example.com',
                'password' => Hash::make('test123'),
                'company_name' => 'Rano Air',
                'username' => 'rano',
                'config_data' => [
                    'page_title' => 'Welcome to Rano Air Limited',
                    'sub_page_title' => 'We make flying easy',
                    'logo' => 'rano.png',
                ]
            ],
            [
                'name' => 'Arik Admin',
                'email' => 'arik@example.com',
                'password' => Hash::make('test123'),
                'company_name' => 'Arik Air',
                'username' => 'arik',
                'config_data' => [
                    'page_title' => 'Welcome to Arik Air Limited',
                    'sub_page_title' => 'Your surest way to fly!',
                    'logo' => 'arik.png',
                ]
            ]
        ]);

        $users->each(fn($user)=>User::updateOrCreate([
            'email' => $user['email']
        ], $user));
    }
}
