<?php

namespace App;

use Illuminate\Database\Eloquent\Eloquent;

class Model extends Eloquent
{
    protected $guarded = [];  // Los campos que no permitiremos tocar por código.
}
