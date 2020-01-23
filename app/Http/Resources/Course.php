<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Instructor as InstructorResource;

class Course extends JsonResource
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
            'code' => $this->code,
            'duration' => $this->duration,
            'cost' => $this->cost,
            'content' => json_decode($this->content, true),
            'instructors' => InstructorResource::collection($this->instructors),

        ];
    }
}
