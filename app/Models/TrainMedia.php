<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainMedia extends Model
{
    use HasFactory;
    protected $fillable = ['train_id', 'media_path'];

    public function train()
    {
        return $this->belongsTo(Train::class);
    }
    
}
