<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Carbon\Carbon;
class ReportController extends Controller
{
    public function reportBooking(Request $request){
      if($request->start && $request->end){
          $end = Carbon::create($request->end)->addDays(1);
          $booking = Register::where('status_id',2)->whereBetween('time_service', [$request->start,$end])->get();
      }else{
          $booking = Register::where('status_id',2)->whereDate('time_service', Carbon::today())->get();
      }

      return view('report.booking')
      ->with('booking',$booking);
    }

    public function reportIncome(Request $request){

        if($request->start && $request->end){
            $end = Carbon::create($request->end)->addDays(1);
            $income = Register::where('status_id',4)->whereBetween('updated_at', [$request->start,$end])->get();

        }else{
            $income = Register::where('status_id',4)->whereDate('updated_at', Carbon::today())->get();
        }
        $sum = 0;
        foreach ($income as $item){
            $sum+=$item->sumPrice();
        }
        return view('report.income')
            ->with('income',$income)
            ->with('sum',$sum);
    }

    public function reportService(){

    }
}
