<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\{
    Role,
    Permission,
    Module
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {

            Permission::firstOrCreate([
                'name' => $perms['name'],
                'module_id'=> Module::firstOrCreate(['name'=>$perms['module']])->id,
                'display_name'=>$perms['display']
            ]);
        }

        $roles_array = ['Admin','User'];

        // add roles
        foreach($roles_array as $role) {
            $role = Role::firstOrCreate(['name' => trim($role)]);

            if( $role->name == 'Admin' ) {
                $role->syncPermissions(Permission::all());

            } else {
                // for others by default only read access
                $role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());
            }
            // create one user for each role
        }

        $this->createUser();
    }

    private function createUser()
    {
        $admin = new User;
        $admin->name = 'Administrator';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->assignRole('Admin');

        $user = new User;
        $user->name = 'User';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->assignRole('User');
    }
}
