<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public function registers(){
        return $this->belongsTo(Register::class,'register_id');
    }

    public function totalPrice(){
     return number_format($this->price*$this->amount) ;
    }
}
