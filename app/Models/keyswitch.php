<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keyswitch extends Model
{
    use HasFactory;
    protected $fillable = ["name", "actuation_force" ,"travel_distance", "type", "test", "prelubed"];

}
