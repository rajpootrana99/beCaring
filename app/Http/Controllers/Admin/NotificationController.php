<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notification.index');
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

        $SERVER_API_KEY = 'AAAAH13Wawo:APA91bE61OXDrCbPrhfsXw91djC-QKAfgqVBfFaL3ta9pexkMuTmOTfa_xgryZwN45KrFgM-G_VVN8zpbdAfWrIXEEKClwMY3eImdYGUzsx7hFo_HXUxTlDJ0GhXShOxW9y-D5SB4kFI';

        $token_1 = 'dXpXYb5tS9acomfCAVlxxH:APA91bEo4Lzxrfx05GY3vgRlsAcCdqivlXu_RVkYdiVCa57QpF91AsDxSzXZNieTsK0_51MVc0u26nlvQhtpI7pdanrBs_nv0N6jJwGov_rsg8Gvebr9ob1-ovKbIjXBmy8-Gg3iNhWd';

        $data = [

            "registration_ids" => [
                $token_1
            ],

            "notification" => [

                "title" => $request->input('title'),

                "body" => $request->input('body'),

                "sound" => "default" // required for sound on ios

            ],

        ];

        $dataString = json_encode($data);

        $headers = [

            'Authorization: key=' . $SERVER_API_KEY,

            'Content-Type: application/json',

        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
        if ($response) {
            return response()->json(['status' => 1, 'message' => 'Patient Added Successfully']);
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
        //
    }
}
