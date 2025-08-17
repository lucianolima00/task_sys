<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $table = 'projects';

    public $fillable = [
        'name',
        'description',
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
