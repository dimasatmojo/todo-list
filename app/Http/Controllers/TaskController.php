<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index($section_id)
    {
        $tasks = Task::where('section_id', $section_id)->get();

        $data = array();
		foreach ($tasks as $key => $item) {
            $data[$key]['section'] = $item->section->name;
            $data[$key]['status'] = $item->status->name;
            $data[$key]['created_at'] = Carbon::parse($item->created_at)->diffForHumans();
        }

        $data = collect($data);

        return $data;
    }

    public function store(Request $request, $section_id)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->section_id = $section_id;
        $task->status_id = $request->status_id;
        $task->save();

        return "Data added succesfully!";
    }

    public function show(Request $request, $section_id, $task_id)
    {
        $task = Task::where('id', $task_id);

        $data = array();
		foreach ($task->get() as $key => $item) {
            $data[$key]['section'] = $item->section->name;
            $data[$key]['status'] = $item->status->name;
            $data[$key]['created_at'] = Carbon::parse($item->created_at)->diffForHumans();
        }

        $data = collect($data);

        return $data;
    }

    public function update(Request $request, $section_id, $task_id)
    {
        $task = Task::where('section_id', $section_id)->where('id', $task_id)->firstOrFail();
        $task->name = $request->name;
        $task->status_id = $request->status_id;
        $task->save();

        return "Data updated succesfully!";
    }

    public function delete($section_id, $task_id)
    {
        $task = Task::find($task_id);
        $task->delete();

        return "Data deleted succesfully!";
    }

    public function filterStatus($section_id, $status_id)
    {
        $tasks = Task::where('section_id', $section_id)->where('status_id', $status_id)->get();

        $data = array();
		foreach ($tasks as $key => $item) {
            $data[$key]['section'] = $item->section->name;
            $data[$key]['status'] = $item->status->name;
            $data[$key]['created_at'] = Carbon::parse($item->created_at)->diffForHumans();
        }

        $data = collect($data);

        return $data;
    }

    public function undoStatus(Request $request, $section_id, $task_id)
    {
        $task = Task::where('section_id', $section_id)->where('id', $task_id)->where('updated_at', '!=', NULL)->firstOrFail();
        $task->status_id = $task->status_id == 1 ? 2 : 1;
        $task->save();

        return "Data status undo succesfully!";
    }
}
