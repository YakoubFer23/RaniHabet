<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('listings')->insert([
            'title' => 'Beautiful Room 1',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'Price' => '350',
            'main_image' => 'assets/listings/Yakoub-Fergag1724462035.png',
            'roomates' => '2',
            'duration' => '1',
            'created_at' => '2024-08-24 00:54:18',
            
        ]);
        DB::table('listings')->insert([
            'title' => 'Beautiful Room 2',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'Price' => '350',
            'main_image' => 'assets/listings/hocineamir.jpg',
            'roomates' => '2',
            'duration' => '1',
            'created_at' => '2024-08-24 00:54:17',
            
        ]);
        DB::table('listings')->insert([
            'title' => 'Beautiful Room 3',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'Price' => '350',
            'main_image' => 'assets/listings/laaziz.jpg',
            'roomates' => '2',
            'duration' => '1',
            'created_at' => '2024-08-24 00:54:16',
        ]);
        DB::table('listings')->insert([
            'title' => 'Beautiful Room 4',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'Price' => '350',
            'main_image' => 'assets/listings/chikour.jpg',
            'roomates' => '2',
            'duration' => '1',
            'created_at' => '2024-08-24 00:54:15',
            
        ]);
        DB::table('listings')->insert([
            'title' => 'Beautiful Room 5',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'Price' => '350',
            'main_image' => 'assets/listings/yakoub.jpg',
            'roomates' => '2',
            'duration' => '1',
            'created_at' => '2024-08-24 00:54:14',
            
        ]);
        DB::table('listings')->insert([
            'title' => 'Beautiful Room 6',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'Price' => '350',
            'main_image' => 'assets/listings/abdou.jpg',
            'roomates' => '2',
            'duration' => '1',
            'created_at' => '2024-08-24 00:54:13',
            
        ]);
    }
}
