<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description', 'image'];

    // coach
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function trains()
    {
        return $this->hasMany(Train::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function muscles()
    {
        return $this->belongsToMany(Muscle::class,'trains');
    }

}
