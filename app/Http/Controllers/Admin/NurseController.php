<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nurse;
use App\Models\Reward;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nurse.index');
    }

    public function fetchNurses(){
        $nurses = Nurse::with('user')->get();
        return response()->json([
            'nurses' => $nurses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $nurse = Nurse::find($user);
        $user = User::where('id', $nurse->nurse_id)->first();
        $reward = Reward::where('nurse_id', $nurse->nurse_id)->first();
        $token = Token::where('nurse_id', $nurse->nurse_id)->first();
        if (!$nurse){
            return response()->json([
                'status' => 0,
                'message' => 'Nurse not exist'
            ]);
        }
        $reward->delete();
        $token->delete();
        $nurse->delete();
        $user->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Nurse Deleted Successfully'
        ]);
    }
}
