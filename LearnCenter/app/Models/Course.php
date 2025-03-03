<?php

namespace App\Models;

use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<CourseFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'user_id'// user_id === teacher_id
    ];
}
