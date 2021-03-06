<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\TaskStatus', 'status_id', 'id');
    }
}
