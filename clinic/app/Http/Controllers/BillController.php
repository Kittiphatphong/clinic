<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use App\Models\Medicine;
use App\Models\Promotion;
use App\Models\Register;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('bill.billList')
            ->with('list_bills',Register::all()->where('status_id',4));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
           "service_id" => "required",
           "medicine_id" => "required",
            "register_id" => "required"
        ]);

        return view('bill.checkBill')
            ->with('order_registers','order_registers')
            ->with('service_id',$request->service_id)
            ->with('medicine_id',$request->medicine_id)
            ->with('register_id',$request->register_id)
            ->with('promotions',Promotion::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $service_id = $request->service_id;
        $service_amount = $request->amount_service;
        $medicine_id = $request->medicine_id;
        $medicine_amount = $request->amount_medicine;

        $register = Register::find($request->register_id);
        $register->status_id = 4;
        $register->userB_id = Auth::user()->id;
        if($request->percent > 0){
            $register->discount = $request->percent;
        }
        $register->save();

        //service
        for($i=0;$i<count($service_id);$i++){
            $bill = new Bill();
            $service= Service::find($service_id[$i]);
            $bill->name = $service->name;
            $bill->price = $service->price;
            $bill->amount = $service_amount[$i];
            $bill->register_id = $register->id;
            $bill->save();
        }

        //medicine
        for($i=0;$i<count($medicine_id);$i++){
            $bill = new Bill();
            $medicine= Medicine::find($medicine_id[$i]);
            $bill->name = $medicine->name;
            $bill->price = $medicine->price;
            $bill->amount = $medicine_amount[$i];
            $bill->register_id = $register->id;
            $bill->save();
        }

        return redirect()->route('bill.index')
            ->with('success','ຊຳ​ລະ​ສຳ​ເລັດ');


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

        $register = Register::find($id);
        $services = $register->register_services->pluck('service_id');
        if($register->status_id != 2){
            return back()->with('warning','ທ່າ​ນບໍ່​ສາ​ມາດ​ຈ່າຍ​ບິນ​ທີ​ບໍ່​ໄດ້​ນັດ​ໝາຍ');
        }

        return view('bill.billCreate')
            ->with('order_registers','order_registers')
            ->with('services',Service::all())
            ->with('data_register',$register)
            ->with('service_register', $services->toArray())
            ->with('medicines',Medicine::all());
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
