<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Step extends Model
{
    public $timestamps = false;
    protected $fillable = ['key','value'];

}
