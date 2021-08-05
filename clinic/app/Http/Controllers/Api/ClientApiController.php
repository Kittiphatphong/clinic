<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Register;
use App\Models\RegisterService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\BookingResource;

class ClientApiController extends Controller
{

    public function clientInfo(Request $request){
        try{
            $client_id =  $request->user()->currentAccessToken()->tokenable->id;

            return response()->json([
               'status' => true,
               'data' => Client::find($client_id),
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'msg' => $e->getMessage()
            ],422);
        }

    }
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

    public function serviceList(){
        try {


            return response()->json([
                'status' => true ,
                'data' => Service::select('id','name','price')->get()
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'msg' => $e->getMessage()
            ],422);
        }
    }

    public function booking(Request $request){
        try {
            $validator=  Validator::make($request->all(), [
                'service_id' => 'required',

            ]);
            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "msg" => $validator->errors()->first(),
                ], 422);
            }
            $client_id =  $request->user()->currentAccessToken()->tokenable->id;
            $service_id = explode(',', $request->service_id);
            $register = new Register();
            if($request->time_service != null){
                $register->time_service = $request->time_service;
            }
            $register->status_id = 1;
            $register->client_id = $client_id;
            if($register->description != null){
                $register->description = $request->description;
            }
            $register->save();

            for($i=0;$i<count($service_id);$i++){
                $register_service = new RegisterService();
                $register_service->register_id = $register->id;
                $register_service->service_id = $service_id[$i];
                $register_service->save();
            }


            return response()->json([
                'status' => true ,
                'msg' => 'ຈອງ​ສຳ​ເລັດ'
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'msg' => $e->getMessage()
            ],422);
        }
    }
    public function bookingList(Request $request){
        $client_id =  $request->user()->currentAccessToken()->tokenable->id;
        try {

            return response()->json([
                'status' => true ,
                'data' => BookingResource::collection(Register::where('client_id',$client_id)->get())
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'msg' => $e->getMessage()
            ],422);
        }
    }

    public function bookingCancel(Request $request){
        try {
            $validator=  Validator::make($request->all(), [
                'booking_id' => 'required|exists:registers,id',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "msg" => $validator->errors()->first(),
                ], 422);
            }

            $register = Register::find($request->booking_id);
            $register->status_id = 3;
            $register->save();
            return response()->json([
                'status' => true,
                'msg' => 'ຍົກ​ເລີກ​ການ​ຈອງ​ຄິ​ວ​ສຳ​ເລັດ'
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'msg' => $e->getMessage()
            ],422);
        }
    }
}
