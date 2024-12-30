<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'title',
        'academic_rank',
        'degree',
        'phone',
        'email',
        'department_id',
    ];
}
