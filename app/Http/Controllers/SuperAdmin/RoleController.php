<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    
    public function index(){

        // $roles = Role::whereNotIn('name', ['admin'])->get();
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){


        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validated = $request->validate(['name' => ['required','min:3']]);
        Role::create($validated);
         return redirect('/roles')->with('success', 'Role created successfully!');;
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
    public function edit(Role $role){
        // dd($role);
         $permissions = Permission::all();
        return view('admin.role.update',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Role $role){

        $validated = $request->validate(['name' => ['required','min:3']]);
        $role->update($validated);
         return redirect('/roles')->with('success', 'Role Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('/roles')->with('error', 'Role Deleted Successfully!');;
    }

    //Methods of resource controller is ended ,now we will use custom methods below according to our use
    public function givePermission(Request $request,$id)
    {
        $role = Role::find($id);

        //  dd($role);//okk
        if($role->hasPermissionTo($request->permission)){
            return back()->with('error','Sorry! Permission exists');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('success','Permission assigned!');
    }



    public function revokePermission($id,$id2)
    {
        $role = Role::find($id);
        $permission = Permission::find($id2);


        //  dd($role);//okk
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('success','Permission revoked');
        }

        return back()->with('error','Permission not exist!');
    }



    public function assign_role_to_user($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.assign_role_to_user',compact('user','roles'));
    }



    public function role_asssigned_to_user(Request $request,$id)
    {
        $user = User::find($id);
        // if($user->assignRole($request->role==)){
        //     return back()->with('error','Role already assigned!');
        // }
        $user->assignRole($request->role);
        return back()->with('success','Role assigned successfully!');
    }



    public function revokeRole($id,$id2)
    {
        $user = User::find($id);
        $role = Role::find($id2);


        //  dd($role);//okk
        if($user->assignRole($role)){
            
            $user->removeRole($role);
            return back()->with('success','Role revoked');
        }

        return back()->with('error','Role not exist!');
    }




}