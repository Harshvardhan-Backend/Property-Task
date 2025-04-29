<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 20) as $i) {
            DB::table('properties')->insert([
                'address' => "123 Street Name #$i",
                'price' => rand(100000, 500000),
                'description' => "Beautiful house number $i",
                'image_urls' => '["https://via.placeholder.com/150"]', // a dummy image URL
                'agent_id' => rand(1,5), // Randomly assign to an agent
            ]);
        }
    }
}
