<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    public $timestamps = true;
    protected $fillable = ["post_id","user_id","comment"];
}
