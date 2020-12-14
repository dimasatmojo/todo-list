<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class CreateTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:task {task_name} {section_id} {status_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new task to DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $task = new Task;
        $task->name = $this->argument('task_name');
        $task->section_id = $this->argument('section_id');
        $task->status_id = $this->argument('status_id');
        $task->save();

        return "Data added succesfully!";
    }
}
