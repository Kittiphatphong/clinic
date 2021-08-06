<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view ('promotion.promotionList')
          ->with('list_promotions',Promotion::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotion.promotionCreate')
            ->with('list_promotions','list_promotions');
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
            'percent' =>  'required|numeric'
        ]);
        $promotion = new Promotion();
        $promotion->name = $request->name;
        $promotion->percent = $request->percent;
        $promotion->save();
        return redirect()->route('promotion.index')
            ->with('success','ເພີ່​ມ​ຂໍ້​ມູນ​ສຳ​ເລັດ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('promotion.promotionCreate')
            ->with('list_promotions','list_promotions')
            ->with('edit',Promotion::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'percent' =>  'required|numeric'
        ]);
        $promotion = Promotion::find($id);
        $promotion->name = $request->name;
        $promotion->percent = $request->percent;
        $promotion->save();
        return redirect()->route('promotion.index')
            ->with('success','ແກ້​ໄຂ​ຂໍ້​ມູນ​ສຳ​ເລັດ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Promotion::find($id)->delete();
        return back()->with('ລຶບ​ຂໍ້​ມຸນ​ສຳ​ເລັດ');
    }
}
