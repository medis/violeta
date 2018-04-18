<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Press extends Model
{
    protected $fillable = ['title', 'source', 'link', 'date', 'enabled'];
}
