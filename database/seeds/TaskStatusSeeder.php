<?php

use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_statuses')->insert([
			[
				'id'        => 1,
				'name'      => 'Do'
            ],
            [
                'id'        => 2,
                'name'      => 'Done'
            ]
		]);
    }
}
