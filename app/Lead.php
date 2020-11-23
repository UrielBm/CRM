<?php

namespace App;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;


class Lead extends Model
{
    use Translatable;
    protected $translatable = ['title', 'body'];
    protected $fillable = ['name', 'phone','message','step_id','email'];
}


