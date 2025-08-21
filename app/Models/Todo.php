<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'completed',
        'category',
        'deadline'
    ];
    
    protected $casts = [
        'completed' => 'boolean',
        'deadline' => 'date',
    ];
}
