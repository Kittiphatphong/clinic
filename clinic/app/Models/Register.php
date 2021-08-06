<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Register extends Model
{
    use HasFactory;

    public function userR(){
        return $this->belongsTo(User::class,'userR_id');
    }

    public function userB(){
        return $this->belongsTo(User::class,'userB_id');
    }

    public function clients(){
        return $this->belongsTo(Client::class,'client_id');
    }

    public function register_services(){
        return $this->hasMany(RegisterService::class,'register_id');
    }

    public function statuses(){
        return $this->belongsTo(Status::class,'status_id');
    }

    public function bills(){
        return $this->hasMany(Bill::class,'register_id');
    }

    public function sumPrice(){
        $bills =  Bill::where('register_id',$this->id)->get();
        $sum = 0;
        foreach ($bills as $bill){
            $sum+=  $bill->amount*$bill->price ;
        }
        if($this->discount>0){
            $sum = $sum - (($this->discount*$sum)/100);
        }
        return  $sum;
    }
    public function priceUnDiscount(){
        $bills =  Bill::where('register_id',$this->id)->get();
        $sum = 0;
        foreach ($bills as $bill){
            $sum+=  $bill->amount*$bill->price ;
        }
        return  $sum;
    }


    public function differentTime(){
        $now = Carbon::now('Asia/Vientiane');
        $time = $now->diffInSeconds($this->time_service);
        $date = $now->diffInDays($this->time_service);
        $formatTime = gmdate('h ຊົວໂມງ i ນາ​ທີ',$time);
        if($this->time_service== null)
            $dateTime = "ຍັງ​ບໍ່​​ນັດ​";
        elseif($now>$this->time_service){
            $dateTime = "ກາຍ​ນັດ ". $date." ມື້ " .$formatTime;
        }
        else
            $dateTime = $date." ມື້ ".$formatTime;

        return $dateTime;
    }
}
