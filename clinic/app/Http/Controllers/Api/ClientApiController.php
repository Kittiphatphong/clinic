<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ClientApiController extends Controller
{
    public function login(Request $request){
        try {
            $validator=  Validator::make($request->all(), [
                'username' => 'required|exists:clients,username',
                'device_token' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "msg" => $validator->errors()->first(),
                ], 422);
            }
            $client = Client::where('username',$request->username)->first();

            if(! $client || !Hash::check($request->password,$client->password)){

                return response()->json(['status' => false ,'msg' => 'This password is not correct'],422);
            }

            $client->tokens()->delete();
            $client->device_token = $request->device_token;
            $client->save();
            $token =    $client->createToken($request->device_token)->plainTextToken;

            return response()->json(['status' => true ,'data' => ['client'=>Client::find($client->id),'token'=>$token]]);

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'msg' => $e->getMessage()
            ],500);
        }
    }

    public function logout(Request $request){
        try {
            $request->user()->currentAccessToken()->delete();
            Client::find($request->user()->currentAccessToken()->tokenable->id);
            return response()->json(['status' => true ,'msg' => 'logout']);
        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'msg' => $e->getMessage()
            ],422);
        }

    }
}
