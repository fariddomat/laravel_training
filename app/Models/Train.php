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

    public function muscle()
    {
        return $this->belongsTo(Muscle::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function media()
    {
        return $this->hasMany(TrainMedia::class);
    }

    public function userTrains()
    {
        return $this->hasMany(UserTrain::class);
    }
}
