<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medicine.medicineList')
            ->with('list_medicines',Medicine::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicine.medicineCreate')
            ->with('list_medicines','list_medicines');
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
            'slug' => 'required',
            'price' => 'required'
        ]);
        $price=round(str_replace(',','',$request->get('price')));
        $medicine = new Medicine();
        $medicine->name = $request->name;
        $medicine->slug = $request->slug;
        $medicine->price = $price;
        $medicine->save();
        return redirect()->route('medicine.index')->with('success','ເພີ່ມ​ຂໍ້​ມູນ​ສຳ​ເລັດ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('medicine.medicineCreate')
            ->with('list_medicines','list_medicines')
            ->with('edit',Medicine::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);
        $price=round(str_replace(',','',$request->get('price')));
        $medicine = Medicine::find($id);
        $medicine->name = $request->name;
        $medicine->slug = $request->slug;
        $medicine->price = $price;
        $medicine->save();
        return redirect()->route('medicine.index')->with('success','ແກ້​ໄຂຂໍ້​ມູນ​ສຳ​ເລັດ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medicine::find($id)->delete();
        return back()->with('success','ລຶບ​ຂໍ້​ມູນ​ສຳ​ເລັດ');
    }
}
