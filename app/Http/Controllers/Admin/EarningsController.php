<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Earnings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EarningsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('earnings.index');
    }

    public function fetchEarnings(){
        $earnings = Earnings::with('nurse.user', 'appointment')->get();
        return response()->json([
            'status' => true,
            'earnings' => $earnings,
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $earning = Earnings::find($id);
        if (!$earning){
            return response()->json([
                'status' => 0,
                'message' => 'Earnings Not Found',
            ]);
        }
        $earning->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Earnings deleted successfully'
        ]);
    }

    public function approveEarning($earning){
        $earning = Earnings::find($earning);
        if ($earning->status == 'Pending'){
            $value = 1;
        }
        else{
            $value = 0;
        }
        $earning->update([
            'status' => $value,
        ]);
        return response()->json([
            'status' => 1,
            'message' => 'Status changed successfully',
        ]);
    }
}
