<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Test extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'cost_ind' => $this->cost_ind,
            'cost_course' => $this->cost_course,
            'result' => $this->result,
            'retake' => $this->retake,
        ];
    }
}
