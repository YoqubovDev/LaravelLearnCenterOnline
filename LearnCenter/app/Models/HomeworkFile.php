<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkFile extends Model
{
    /** @use HasFactory<\Database\Factories\HomeworkFileFactory> */
    use HasFactory;
    protected $fillable=[
        'homework_id',
        'file',
    ];
}
