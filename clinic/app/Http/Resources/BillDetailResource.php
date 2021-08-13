<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BillDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name_service' => $this->name,
            'price' => $this->price,
            'amount' => $this->amount,
            'total_price' => $this->price * $this->amount
        ];
    }
}
