<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'university_enrollment' => $this->university_enrollment,
            'career' => $this->career->name,
            'activity' => $this->activity->name,
            'teacher' => $this->activity->user[0]->name,
        ];
    }
}
