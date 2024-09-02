<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => '6c31229b-f3cf-412f-8d30-d956c3df669e',
            'firstname' => 'Yakoub',
            'lastname' => 'Fergag',
            'email' => 'yakoub_23@live.fr',
            'email_verified_at' => '2024-08-24 00:54:44',
            'identity_verified' => 'verified',
            'identity_verified_picture' => 'assets/idVerification/Yakoub-Fergag1724462035.png',
            'password' => Hash::make('12345678'),
            'created_at' => '2024-08-24 00:54:12',
            'updated_at' => '2024-08-24 00:54:12',
            
        ]);
    }
}
