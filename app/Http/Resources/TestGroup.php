<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TestGroup extends JsonResource
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
            'test' => new Test($this->test),
            'available_chairs' => $this->available_chairs,
            'group_date' => $this->group_date,
            'opened' => $this->opened,
            'result' => $this->whenPivotLoaded('student_test_group', function () {
                return $this->pivot->result;
            }),
            'take' => $this->whenPivotLoaded('student_test_group', function () {
                return $this->pivot->take;
            }),
        ];
    }
}
