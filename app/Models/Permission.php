<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    //

    public function module()
    {
        return $this->belongsTo('App\Models\Module');
    }

    public static function defaultPermissions()
    {
        $array = [
            ['module'=>'User','name'=>'view_user','display'=>'View Users'],
            ['module'=>'User','name'=>'add_user','display'=>'Add Users'],
            ['module'=>'User','name'=>'edit_user','display'=>'Edit Users'],
            ['module'=>'User','name'=>'delete_user','display'=>'Delete Users'],

            ['module'=>'Role','name'=>'view_role','display'=>'View Roles'],
            ['module'=>'Role','name'=>'add_role','display'=>'Add Roles'],
            ['module'=>'Role','name'=>'edit_role','display'=>'Edit Roles'],
            ['module'=>'Role','name'=>'delete_role','display'=>'Delete Roles'],

            ['module'=>'Permission','name'=>'view_permission','display'=>'View Permissions'],
            ['module'=>'Permission','name'=>'add_permission','display'=>'Add Permissions'],
            ['module'=>'Permission','name'=>'edit_permission','display'=>'Edit Permissions'],
            ['module'=>'Permission','name'=>'delete_permission','display'=>'Delete Permissions'],
        ];

        return $array;
    }
}
