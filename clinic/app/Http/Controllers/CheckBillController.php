<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use App\Models\Medicine;
use App\Models\Promotion;
use App\Models\Register;
use App\Models\RegisterService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CheckBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
           'client_id' => 'required',
           'service_id' => 'required',
           'medicine_id' => 'required',

        ]);

        return view('checkbill.checkbillCheckout')
            ->with('list_bills','list_bills')
            ->with('service_id',$request->service_id)
            ->with('medicine_id',$request->medicine_id)
            ->with('client_id',Client::find($request->client_id))
            ->with('description',$request->description)
            ->with('promotions',Promotion::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checkbill.checkbillCreate')
            ->with('list_bills','list_bill')
            ->with('services',Service::all())
            ->with('medicines',Medicine::all())
            ->with('clients',Client::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $service_id = $request->service_id;
        $service_amount = $request->amount_service;
        $medicine_id = $request->medicine_id;
        $medicine_amount = $request->amount_medicine;

        $register = new Register();
        $register->time_service = $request->time_service;
        $register->status_id = 4;
        $register->client_id = $request->client_id;
        $register->booking_status = 0;
        if($request->percent > 0 ){
            $register->discount = $request->percent;
        }
        if($register->description != null){
            $register->description = $request->description;
        }
        $register->userR_id = Auth::user()->id;
        $register->userB_id = Auth::user()->id;
        $register->save();

        for($i=0;$i<count($service_id);$i++){
            $register_service = new RegisterService();
            $register_service->register_id = $register->id;
            $register_service->service_id = $service_id[$i];
            $register_service->save();
        }

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
            ->with('success','ຊຳລະ​ສຳ​ເລັດ');
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
        $register = Register::find($id);
        if($register->booking_status == 1){
            $register->status_id = 2;
            $register->discount = 0 ;
            $register->save();
dd($register->bills->pluck('id'));
            DB::table('bills')->whereIn('register_id',$register->bills->pluck('id'))->delete();
            return redirect()->route('order-register.index')
                ->with('success','ລຶບ​ຂໍ້​ມູນ​ສຳ​ເລັດ​');

        }else{
         $register->delete();
         return back()->with('success','ລຶບ​ຂໍ້​ມູນ​ສຳ​ເລັດ');
        }

    }
}
