<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use Carbon\Carbon;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();

        $data = array();
		foreach ($sections as $key => $item) {
            $data[$key]['name'] = $item->name;
            $data[$key]['created_at'] = Carbon::parse($item->created_at)->diffForHumans();
        }

        $data = collect($data);

        return $data;
    }

    public function store(Request $request)
    {
        $section = new Section;
        $section->name = $request->name;
        $section->save();

        return "Data added succesfully!";
    }

    public function show(Request $request, $section_id)
    {
        $section = Section::find($section_id);

        return $section;
    }

    public function update(Request $request, $section_id)
    {
        $section = Section::find($section_id);
        $section->name = $request->name;
        $section->save();

        return "Data updated succesfully!";
    }

    public function delete($section_id)
    {
        $section = Section::find($section_id);
        $section->delete();

        return "Data deleted succesfully!";
    }
}
