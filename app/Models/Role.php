<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    public static function userData()
    {
        return static::where('name','!=','SAdmin');
    }
}
