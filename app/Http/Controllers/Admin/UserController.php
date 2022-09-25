<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\{Role,Channeling,Revision};
use App\Authorizable;
use Hash,DB;

class UserController extends Controller
{
    use Authorizable;
    public function index()
    {
        $users = User::get();
        return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name','id');
        return view('admin.user.create',compact('roles'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'
        ]);

        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);

            // Create the user
            if ( $user = User::create($request->except('roles', 'permissions')) ) {
                $this->syncPermissions($request, $user);
                // flash('User has been created.');
            } else {
                // flash()->error('Unable to create user.');
            }

        return redirect()->route('user.index');
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        $roles = Role::userData()->pluck('name','id');
        return view('admin.user.edit',compact('roles','user'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1'
        ]);

        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));

        // check for password change
        if($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        // Handle the user roles
        $this->syncPermissions($request, $user);

        $user->save();

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return response()->json([
            'success'=>true,
            'message'=>'deleted success',
            'refresh'=>true,
        ]);
    }

    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }

    public function passwordReset()
    {
        return view('admin.user.password',['user'=>auth()->user()]);
    }

    public function postPasswordReset(Request $request)
    {
        $user = $request->user();
        $rules = array(
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        );
        $this->validate($request, $rules);
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors('Your old password does not match.');

        } else {
            $user->password = bcrypt($request->password);
            $user->save();
            auth()->login($user);
            session()->flash('info','Your password has been changed.');
            return redirect()->route('admin');
        }
    }

    public function userTrack()
    {
        $date = isset(request()->date) ? request()->date : stoday();
        $users = User::whereHas('revisions',function($q) use ($date){
                    $q->whereDate('created_at',$date);
                })->get();
        $params = [
            'users'=>$users,
            'date'=>$date 
        ];
        return view('admin.user.user_track',$params);
    }
}
