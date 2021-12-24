<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;//pour changer le retour de l'api

class Plantation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
        'code' => $this->code,
        'date' => $this->date,
        'latitude' => $this->latitude,
        'longitude' => $this->longitude,
        'lieu' => $this->lieu,
        //'longitude' => Str::words($this->description, 10),
    ];
    }
}
