<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyswitch extends Model
{
    use HasFactory;
    protected $fillable = ["name", "actuation_force" ,"travel_distance", "type", "prelubed", "quantity", "price", "store_id"];

    public function store(){ 
        return $this->belongsTo(Store::class);
    }
}
