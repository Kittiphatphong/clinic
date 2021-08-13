<?php

namespace App\Http\Resources;

use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class BillClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       if($this->booking_status == true){
           $booking_status = 'ຈອງ​ຄິ​ວ';
       }else{
           $booking_status = 'ໜ້າ​ຮ້າ​ນ';
       }


        return [
             'id' => $this->id,
             'time_service' => $this->updated_at,
             'pay_price' => $this->sumPrice(),
             'percent_discount' => $this->discount,
             'price_UnDiscount' => $this->priceUnDiscount(),
            'type_pay' => $booking_status,
             'bill_detail' => BillDetailResource::collection($this->bills),


        ];
    }
}
