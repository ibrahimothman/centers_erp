<?php

namespace App\Http\Resources;
use App\Http\Resources\Address as AddressResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Student extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'nameAr' => $this->nameAr,
            'nameEn' => $this->nameEn,
            'email' => $this->email,
            'image' => $this->image,
            'idImage' => $this->idImage,
            'phoneNumber' => $this->phoneNumber,
            'phoneNumberSec' => $this->phoneNumberSec,
            'idNumber' => $this->idNumber,
            'passportNumber' => $this->passportNumber,
            'skillCArdNumber' => $this->skillCArdNumber,
            'degree' => $this->degree,
            'faculty' => $this->faculty,
            'address' => new AddressResource($this->address),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
