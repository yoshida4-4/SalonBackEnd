<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Reservation::create([
            'user_id' => 3,
            'stylist_id' => 1,
            'service_id' => 5,
            'date' => '2024-12-05',
            'start_flame' => 3,
            'end_flame' => 5
        ]);
        
        // \App\Models\User::create([
        //     'id' => 2,
        //     'name' => '田中三郎',
        //     'email' => 'cccc@cccc',
        //     'password' => 'aaaa'
        // ]);
}
}