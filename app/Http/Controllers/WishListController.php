<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WishListController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:wish_lists',
            'city' => 'required',
            'phone' => 'required',
        ]);

        if($validator->fails()){
            $message = $validator->errors();
            return collect([
                'status' => false,
                'message' =>$message->first()
            ]);
        }

        $wishList = WishList::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'city' => $request->input('city'),
            'phone' => $request->input('phone'),
        ]);

        return response([
            'status' => true,
            'wishList' => $wishList,
        ]);
    }
}
