<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    use HasFactory;
    protected $fillable = ["name", "builder_name", "keyswitch_id"];

    public function keyswitch(){ 
        //Belongs to a seperate table, not the table belongs to this table
        return $this->belongsTo(Keyswitch::class);
    }
}
