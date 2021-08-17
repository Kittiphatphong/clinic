<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Carbon\Carbon;
class ReportController extends Controller
{
    public function reportBooking(Request $request){
      $dateToday =  Carbon::crate
      $booking = Register::where('status_id',3)->where;
      return view('report.booking')
      ->with('booking',$booking);
    }

    public function reportIncome(){

    }

    public function reportService(){

    }
}
