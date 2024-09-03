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
            'id' => '8a4bf4f0-e072-4838-bd42-d9894dba8752',
            'title' => 'Beautiful Room 1',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'City' => 'Columbus',
            'State'=> 'OH',
            'Price' => '350',
            'thumbnail' => 'listings/hocineamir.jpg',
            'type' => 'Private Room',
            'gender' => 'Male',
            'availability' => '2024-10-01',
            'duration' => '1 Month',
            'status' => 'Online',
            'user_id' => '6c31229b-f3cf-412f-8d30-d956c3df669e',
            'created_at' => '2024-08-24 00:54:17',
            'updated_at' => '2024-08-24 00:54:17',
            
        ]);
        DB::table('listings')->insert([
            'id' => '8a4bf4f0-e072-4838-bd42-d9894dba8753',
            'title' => 'Beautiful Room 2',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'City' => 'NewYork',
            'State'=> 'OH',
            'Price' => '354',
            'thumbnail' => 'listings/chikour.jpg',
            'type' => 'Private Room',
            'gender' => 'Male',
            'availability' => '2024-10-01',
            'duration' => '1 Month',
            'status' => 'Online',
            'user_id' => '6c31229b-f3cf-412f-8d30-d956c3df669e',
            'created_at' => '2024-08-24 00:54:17',
            'updated_at' => '2024-08-24 00:54:17',
            
        ]);
        DB::table('listings')->insert([
            'id' => '8a4bf4f0-e072-4838-bd42-d9894dba8754',
            'title' => 'Beautiful Room 3',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'City' => 'Cincinatti',
            'State'=> 'OH',
            'Price' => '350',
            'thumbnail' => 'listings/hocineamir.jpg',
            'type' => 'Private Room',
            'gender' => 'Male',
            'availability' => '2024-10-01',
            'duration' => '1 Month',
            'status' => 'Online',
            'user_id' => 'e14cf3f4-b6b9-4a4f-8fcd-0246a2a77fdc',
            'created_at' => '2024-08-24 00:54:17',
            'updated_at' => '2024-08-24 00:54:17',
            
        ]);
        DB::table('listings')->insert([
            'id' => '8a4bf4f0-e072-4838-bd42-d9894dba8755',
            'title' => 'Beautiful Room 4',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'City' => 'Columbus',
            'State'=> 'OH',
            'Price' => '250',
            'thumbnail' => 'listings/abdou.jpg',
            'type' => 'Private Room',
            'gender' => 'Male',
            'availability' => '2024-10-01',
            'duration' => '1 Month',
            'status' => 'Online',
            'user_id' => 'e14cf3f4-b6b9-4a4f-8fcd-0246a2a77fdc',
            'created_at' => '2024-08-24 00:54:17',
            'updated_at' => '2024-08-24 00:54:17',
            
        ]);
        DB::table('listings')->insert([
            'id' => '8a4bf4f0-e072-4838-bd42-d9894dba8756',
            'title' => 'Beautiful Room 5',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'City' => 'Columbus',
            'State'=> 'OH',
            'Price' => '350',
            'thumbnail' => 'listings/laaziz.jpg',
            'type' => 'Private Room',
            'gender' => 'Male',
            'availability' => '2024-10-01',
            'duration' => '1 Month',
            'status' => 'Online',
            'user_id' => '6c31229b-f3cf-412f-8d30-d956c3df669e',
            'created_at' => '2024-08-24 00:54:17',
            'updated_at' => '2024-08-24 00:54:17',
            
        ]);
        DB::table('listings')->insert([
            'id' => '8a4bf4f0-e072-4838-bd42-d9894dba8757',
            'title' => 'Beautiful Room 6',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'City' => 'Columbus',
            'State'=> 'OH',
            'Price' => '350',
            'thumbnail' => 'listings/hocineamir.jpg',
            'type' => 'Private Room',
            'gender' => 'Male',
            'availability' => '2024-10-01',
            'duration' => '1 Month',
            'status' => 'Online',
            'user_id' => 'fb563bb3-46e9-424d-a1b0-ef207c341639',
            'created_at' => '2024-08-24 00:54:17',
            'updated_at' => '2024-08-24 00:54:17',
            
        ]);
        DB::table('listings')->insert([
            'id' => '8a4bf4f0-e072-4838-bd42-d9894dba8758',
            'title' => 'Beautiful Room 7',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'City' => 'Columbus',
            'State'=> 'OH',
            'Price' => '350',
            'thumbnail' => 'listings/chikour.jpg',
            'type' => 'Private Room',
            'gender' => 'Male',
            'availability' => '2024-10-01',
            'duration' => '1 Month',
            'status' => 'Online',
            'user_id' => '6c31229b-f3cf-412f-8d30-d956c3df669e',
            'created_at' => '2024-08-24 00:54:17',
            'updated_at' => '2024-08-24 00:54:17',
            
        ]);
        DB::table('listings')->insert([
            'id' => '8a4bf4f0-e072-4838-bd42-d9894dba8759',
            'title' => 'Beautiful Room 8',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'City' => 'Columbus',
            'State'=> 'OH',
            'Price' => '350',
            'thumbnail' => 'listings/hocineamir.jpg',
            'type' => 'Private Room',
            'gender' => 'Male',
            'availability' => '2024-10-01',
            'duration' => '1 Month',
            'status' => 'Online',
            'user_id' => 'fb563bb3-46e9-424d-a1b0-ef207c341639',
            'created_at' => '2024-08-24 00:54:17',
            'updated_at' => '2024-08-24 00:54:17',
            
        ]);
        DB::table('listings')->insert([
            'id' => '8a4bf4f0-e072-4838-bd42-d9894dba8760',
            'title' => 'Beautiful Room 9',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'City' => 'Columbus',
            'State'=> 'OH',
            'Price' => '350',
            'thumbnail' => 'listings/hocineamir.jpg',
            'type' => 'Private Room',
            'gender' => 'Male',
            'availability' => '2024-10-01',
            'duration' => '1 Month',
            'status' => 'Online',
            'user_id' => '6c31229b-f3cf-412f-8d30-d956c3df669e',
            'created_at' => '2024-08-24 00:54:17',
            'updated_at' => '2024-08-24 00:54:17',
            
        ]);
        DB::table('listings')->insert([
            'id' => '8a4bf4f0-e072-4838-bd42-d9894dba8761',
            'title' => 'Beautiful Room 10',
            'description' => 'It is so beautiful',
            'address' => '123 Room St',
            'City' => 'Columbus',
            'State'=> 'OH',
            'Price' => '350',
            'thumbnail' => 'listings/chikour.jpg',
            'type' => 'Private Room',
            'gender' => 'Male',
            'availability' => '2024-10-01',
            'duration' => '1 Month',
            'status' => 'Online',
            'user_id' => 'fb563bb3-46e9-424d-a1b0-ef207c341639',
            'created_at' => '2024-08-24 00:54:17',
            'updated_at' => '2024-08-24 00:54:17',
            
        ]);
        
    }
}
