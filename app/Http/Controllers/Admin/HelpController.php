<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('help.index');
    }

    public function fetchHelps(){
        $helps = Help::all();
        return response()->json([
            'status' => true,
            'helps' => $helps,
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
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $help = Help::create($request->all());
        if ($help){
            return response()->json(['status' => 1, 'message' => 'Help Added Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function show(Help $help)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function edit($help)
    {
        $help = Help::find($help);
        if ($help){
            return response()->json([
                'status' => 200,
                'help' => $help,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'error' => 'Help Not Found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $help)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $help = Help::find($help);
        $help->update($request->all());
        if ($help){
            return response()->json(['status' => 1, 'message' => 'Help Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function destroy($help)
    {
        $help = Help::find($help);
        if (!$help){
            return response()->json([
                'status' => 0,
                'message' => 'Help Not Exist',
            ]);
        }
        else{
            $help->delete();
            return response()->json([
                'status' => 1,
                'message' => 'Help Deleted Successfully'
            ]);
        }
    }
}
