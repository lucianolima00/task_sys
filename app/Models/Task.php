<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'description',
        'project_id'
    ];

    public function project()
    {
        return $this->hasOne(Project::class);
    }
}
