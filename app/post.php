<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public $timestamps = true;
    protected $fillable = ["title","content","author"];
}
