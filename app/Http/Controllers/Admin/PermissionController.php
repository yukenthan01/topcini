<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Permission,Module,Role};
use App\Authorizable;

class PermissionController extends Controller
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        if(request()->sync){
            if($role = Role::where('name', 'Admin')->first()) {
                $role->syncPermissions(Permission::all());
            }
            
        }
        return view('admin.permission.index',compact('permissions'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resources = ['view','add','edit','delete'];
        if(isset($request->resource)){
            foreach($resources as $resource){
                $permission = new Permission;
                $permission->name = $resource.'_'.strtolower($request->module);
                $permission->display_name = ucfirst($resource).' '.$request->module;
                $permission->guard_name = 'web';
                $permission->module_id = Module::firstOrCreate(['name'=>$request->module])->id;
                $permission->save();
            }       
        }else{

            $permission = new Permission;
            $permission->name = $request->name;
            $permission->display_name = $request->display_name;
            $permission->guard_name = 'web';
            $permission->module_id = Module::firstOrCreate(['name'=>$request->module])->id;
            $permission->save();
        }

        if($role = Role::where('name', 'Admin')->first() ) {
            $role->syncPermissions(Permission::all());
        }
        if($role = Role::where('name', 'SAdmin')->first()) {
            $role->syncPermissions(Permission::all());
        }

        return redirect()->route('permission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $permission->module_name = $permission->module->name;
        return view('admin.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->guard_name = 'web';
        $permission->module_id =  Module::firstOrCreate(['name'=>$request->module])->id;
        $permission->save();
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        if($role = Role::where('name', 'Admin')->first() ) {
            $role->syncPermissions(Permission::all());
        }
        if($role = Role::where('name', 'SAdmin')->first()) {
            $role->syncPermissions(Permission::all());
        }
        return response()->json([
            'success'=>true,
            'message'=>'Item Removed'
        ]);


    }

   

}
