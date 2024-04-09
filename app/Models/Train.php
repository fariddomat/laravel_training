<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;
    protected $fillable = [
        'muscle_id',
        'category_id',
        'level',
        'title',
        'description',
        'goal',
        'days_of_week'
    ];
}
