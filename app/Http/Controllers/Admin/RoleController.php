<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Role,Permission,Module};
use App\Authorizable;

class RoleController extends Controller
{
    use Authorizable;


    public function __construct() {
        
        // this function defined in base controller
        //  not an resource methods, initiate user able to access
        // $this->abilities([
        //    'getTest'=>'change'
        // ]);
    }

    public function index()
    {
        // dd($this->abilities);
        $roles = Role::userData()->get();
        $permissions = Permission::all();

        return view('admin.role.index', compact('roles', 'permissions'));
    }

    

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:roles']);

        if( Role::create($request->only('name')) ) {
            // flash('Role Added');
        }

        return redirect()->back();
    }

    public function edit(Role $role)
    {
        $modules = Module::orderBy('name','asc')->get();
        $params = [
            'modules'=> $modules,
            'role'=>$role
        ];
        if($role->name === 'Admin' || $role->name === 'SAdmin'){
            $params['options']=  ['disabled'];
        }
                        
        return view('admin.role.edit', $params);
    }

    public function update(Request $request, $id)
    {
        if($role = Role::findOrFail($id)) {
            // admin role has everything
            if($role->name === 'Admin' || $role->name === 'SAdmin') {
                $role->syncPermissions(Permission::all());
                return redirect()->route('role.index');
            }

            $permissions = $request->get('permissions', []);
            $role->syncPermissions($permissions);
            // flash( $role->name . ' permissions has been updated.');
        } else {
            // flash()->error( 'Role with id '. $id .' note found.');
        }

        return redirect()->route('role.index');
    }

    public function getTest()
    {
        
        return 'Ok';
    }
}
