<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany(Bill::class,'bill_id');
    }
}
