<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class EmployeeController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index');
    }

    public function fetchEmployees(){
        $employees = User::where('parent_id', Auth::id())->get();
        return response()->json([
            'status' => true,
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('id', Auth::id())->first();
        $permissions = $user->getAllPermissions();
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
        $validator = tap(Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed:password_confirmation',
            'permission_id' => 'required',
        ]), function (){
            if(request()->hasFile(request()->image)){
                Validator::make(request()->all(),[
                    'image' => 'required|file|image',
                ]);
            }
        });
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $employee = User::create([
            'name' => $first_name.' '.$last_name,
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'parent_id' => Auth::id(),
            'is_approved' => 1,
        ]);
        $employee->givePermissionTo($request->input('permission_id'));
        $employee->assignRole('Moderator');
        $this->storeImage($employee);
        if ($employee){
            return response()->json(['status' => 1, 'message' => 'Patient Added Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $employee = User::find($user);
        $user = User::where('id', Auth::id())->first();
        $permissions = $user->getAllPermissions();
        if($employee){
            return response()->json([
                'status' => 200,
                'permissions' => $permissions,
                'employee' => $employee,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $validator = tap(Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|exists:users',
            'permission_id' => 'required',
        ]), function (){
            if(request()->hasFile(request()->image)){
                Validator::make(request()->all(),[
                    'image' => 'required|file|image',
                ]);
            }
        });
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $employee = User::find($user);
        $employee->update([
            'name' => $first_name.' '.$last_name,
            'email' => $request->input('email'),
        ]);
        $employee->revokePermissionTo($employee->permissions);
        $employee->givePermissionTo($request->permission_id);
        $this->storeImage($employee);
        if ($employee){
            return response()->json(['status' => 1, 'message' => 'Employee Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $employee = User::find($user);
        if (!$employee){
            return response()->json([
                'status' => 0,
                'message' => 'Employee not exist'
            ]);
        }
        $employee->revokePermissionTo($employee->permissions);
        $employee->roles()->detach();
        $employee->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Employee Deleted Successfully'
        ]);
    }

    public function storeImage($employee)
    {
        $employee->update([
            'image' => $this->imagePath('image', 'employee', $employee),
        ]);
    }
}
