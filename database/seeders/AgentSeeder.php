<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentSeeder extends Seeder
{
    public function run()
    {
        DB::table('agents')->insert([
            ['name' => 'Virat Kohli', 'email' => 'Virat@example.com', 'phone' => '1234567890'],
            ['name' => 'Rohit Sharma', 'email' => 'Rohit@example.com', 'phone' => '2345678901'],
            ['name' => 'M. S. Dhoni', 'email' => 'Dhoni@example.com', 'phone' => '3456789012'],
            ['name' => 'Shreyas Iyer', 'email' => 'Iyer@example.com', 'phone' => '4567890123'],
            ['name' => 'Hardik Pandya', 'email' => 'Hardik@example.com', 'phone' => '5678901234'],
        ]);
    }
}
