<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service.serviceList')
            ->with('list_services',Service::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.serviceCreate')
            ->with('list_services','list_services');
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
           'name' => 'required',
           'price' => 'required'
        ]);
        $price=round(str_replace(',','',$request->get('price')));

        $service = new Service();
        $service->name = $request->name;
        $service->price = $price;
        $service->save();
        return redirect()->route('service.index')
            ->with('success','ເພີ່ມ​ຂໍ້​ມູນ​ສຳ​ເລັດ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('service.serviceCreate')
            ->with('list_services','list_services')
            ->with('edit',Service::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $price=round(str_replace(',','',$request->get('price')));

        $service = Service::find($id);
        $service->name = $request->name;
        $service->price = $price;
        $service->save();
        return redirect()->route('service.index')
            ->with('success','ແກ້​ໄຂ​ຂໍ້​ມູນ​ສຳ​ເລັດ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();
        return back()->with('success','ລຶບ​ຂໍ້​ມູນ​ສຳ​ເລັດ');
    }
}
