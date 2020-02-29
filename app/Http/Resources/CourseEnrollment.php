<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseEnrollment extends JsonResource
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
            'course' => new Course(\App\Course::findOrFail($this->course_id)),
            'group' => new CourseGroup(\App\CourseGroup::findOrFail($this->id))
        ];
    }
}
