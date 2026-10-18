<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = ['name', 'species', 'price', 'description', 'image', 'sunlight_requirements'];
}
