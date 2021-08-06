<?php

namespace App\Http\Resources;

use App\Models\RegisterService;
use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'time_service' => $this->time_service,
            'service_list' => Service::find($services)->pluck('name'),
            'status' => $this->statuses->name,
            'status_id' => $this->status_id,
            'user_receive' => $user,
            'time_booking' => $this->created_at,
            'time_period' => $this->differentTime()
        ];
    }
}
