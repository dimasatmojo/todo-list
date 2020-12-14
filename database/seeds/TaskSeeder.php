<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=1; $i <= 10; $i++) { 
            DB::table('tasks')->insert([
                'name' => $faker->name,
                'section_id' => ($i % 2 == 0 ? $i/2 : ($i == 1 ? 1 : ($i+1)/2)),
                'status_id' => ($i % 2 == 0 ? 2 : 1),
            ]);
        }
    }
}
