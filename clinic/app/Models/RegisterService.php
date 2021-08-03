<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterService extends Model
{
    use HasFactory;
    public function services(){
        return $this->belongsTo(Service::class,'service_id');
    }
    public function registers(){
        return $this->belongsTo(Register::class,'register_id');
    }
}
