<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = ['name', 'type', 'duration', 'calories', 'date'];

public function user()
{
    return $this->belongsTo(User::class);
}
}
