<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectWorker extends Model
{
    use HasFactory;
    protected $table = 'project_workers';
    protected $guarded = false;
}
