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
        if($this->userR != null){
            $user = $this->userR->name;
        }else{
            $user = null;
        }
        $services = $this->register_services->pluck('service_id');
        return [
            'id' => $this->id,
            'time_service' => $this->updated_at,
             'pay_price' => $this->sumPrice(),
             'percent_discount' => $this->discount,
             'price_UnDiscount' => $this->priceUnDiscount(),
             'bill_detail' => BillDetailResource::collection($this->bills)

        ];
    }
}
