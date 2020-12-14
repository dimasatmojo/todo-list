<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class ChangeTaskStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:update {task_id} {section_id} {status_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update task status';

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
        $task = Task::where('section_id', $this->argument('section_id'))->where('id', $this->argument('task_id'))->firstOrFail();
        $task->status_id = $this->argument('status_id');
        $task->save();

        print "Task status updated succesfully!";
    }
}
