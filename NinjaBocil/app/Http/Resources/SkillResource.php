<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ,
            'fotoskill' => $this->fotoskill,
            'nama_skill' => $this->nama_skill,
            'slug_skill' => $this->slug_skill,
            'grade_skill' => $this->grade_skill,
            'damage_skill' => $this->damage_skill,
            'kartegori' => $this->kartegori,
            'tier_skill' => $this->tier_skill,
        ];
    }
}
