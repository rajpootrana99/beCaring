<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrainingController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('training.index');
    }

    public function fetchTrainings(){
        $trainings = Training::all();
        if ($trainings){
            return response()->json([
                'status' => true,
                'trainings' => $trainings,
            ]);
        }
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
        $validator = tap(Validator::make($request->all(),[
            'title' => 'required',
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
        $training = Training::create($request->all());
        $this->storeMedia($training);
        if ($training){
            return response()->json(['status' => 1, 'message' => 'Training Added Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit($training)
    {
        $training = Training::find($training);
        if ($training){
            return response()->json([
                'status' => 200,
                'training' => $training,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Training not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $training)
    {
        $validator = tap(Validator::make($request->all(),[
            'title' => 'required',
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

        $training = Training::find($training);
        $training->update($request->all());
        $this->storeMedia($training);
        if ($training){
            return response()->json(['status' => 1, 'message' => 'Training Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy($training)
    {
        $training = Training::find($training);
        if (!$training){
            return response()->json([
                'status' => 0,
                'message' => 'Training Not Exist'
            ]);
        }
        $training->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Training Deleted Successfully',
        ]);
    }

    public function storeMedia($training)
    {
        $training->update([
            'media' => $this->imagePath('media', 'training', $training),
        ]);
    }
}
