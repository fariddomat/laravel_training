<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'day_of_week',
        'start_time',
        'end_time',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
