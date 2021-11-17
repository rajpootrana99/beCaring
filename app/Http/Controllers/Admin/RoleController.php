<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('role.index');
    }

    public function fetchRoles(){
        $roles = Role::with('permissions')->get();
        return response()->json([
            'status' => true,
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        if($permissions){
            return response()->json([
                'status' => 200,
                'permissions' => $permissions,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'error' => 'Permission Not Found'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'permission_id' => 'required',
            'name' => 'required|unique:roles',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $role = Role::create($request->all());
        $role->givePermissionTo($request->permission_id);

        if ($role){
            return response()->json(['status' => 1, 'message' => 'Role Added Successfully']);
        }
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
    public function edit($role)
    {
        $permissions = Permission::all();
        $role = Role::find($role);
        $rolePermissions = $role->permissions()->get();
        return response()->json([
            'status' => 200,
            'permissions' => $permissions,
            'role' => $role,
            'rolePermissions' => $rolePermissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {
        $validator = Validator::make($request->all(), [
            'permission_id' => 'required',
            'name' => 'required|exists:roles',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $role = Role::find($role);
        $role->update($request->all());
        $role->revokePermissionTo($role->permissions);
        $role->givePermissionTo($request->permission_id);
        if ($role){
            return response()->json(['status' => 1, 'message' => 'Role Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {
        $role = Role::find($role);
        if (!$role){
            return response()->json([
                'status' => 0,
                'message' => 'Role not exist'
            ]);
        }
        $role->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Role Deleted Successfully',
        ]);
    }
}
