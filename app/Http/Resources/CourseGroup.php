<?php

namespace App\Http\Resources;

use App\Utility;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseGroup extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'start' => Utility::getDate($this->start_at),
            'end' => Utility::getDate($this->start_at),
        ];
    }
}
