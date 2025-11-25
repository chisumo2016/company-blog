<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // \App\Models\Category::factory(10)->create();
        //\App\Models\Post::factory(25)->create();
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
