<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    /** @use HasFactory<\Database\Factories\HomeworkFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'deadline',
        'course_id',
        'user_id',
    ];
}
