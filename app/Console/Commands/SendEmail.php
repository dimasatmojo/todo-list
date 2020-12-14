<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Carbon\Carbon;
use App\Mail\TaskList;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email of task list to a given email';

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
        $tasks = Task::all();

        $data = array();
		foreach ($tasks as $key => $item) {
            $data[$key]['section'] = $item->section->name;
            $data[$key]['task'] = $item->name;
            $data[$key]['status'] = $item->status->name;
            $data[$key]['created_at'] = Carbon::parse($item->created_at)->diffForHumans();
        }

        $data = collect($data);

        Mail::to('nsa@example.net')->send(new TaskList($data));

        print "Email send successfully!";
    }
}
