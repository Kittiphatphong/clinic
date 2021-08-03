<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Register;
use App\Models\RegisterService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('que.queList')
            ->with('order_registers',Register::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('que.queCreate')
            ->with('order_registers','order_registers')
            ->with('clients',Client::all())
            ->with('services',Service::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'service_id' => 'required',
            'time_service' => 'required',
            'client_id' => 'required',
        ]);
        $service_id = $request->service_id;
        $register = new Register();
        $register->time_service = $request->time_service;
        $register->status_id = 2;
        $register->client_id = $request->client_id;
        if($register->description != null){
            $register->description = $request->description;
        }
        $register->userR_id = Auth::user()->id;
        $register->save();

        for($i=0;$i<count($service_id);$i++){
         $register_service = new RegisterService();
         $register_service->register_id = $register->id;
         $register_service->service_id = $service_id[$i];
         $register_service->save();
        }
        return redirect()->route('order-register.index')
            ->with('success','ເພີ່​ມຄິວ​ສຳ​ເລັດ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Register::find($id)->delete();
       return back()->with('success','ລຶບ​ຂໍ້​ມູນ​ສຳ​ເລັດ');
    }
}
