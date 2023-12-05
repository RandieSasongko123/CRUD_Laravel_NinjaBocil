<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TailedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'foto_tailed' => $this->foto_tailed,
            'nama_tailed' => $this->nama_tailed,
            'slug_tailed' => $this->slug_tailed,
            'tailed_skill_1' => $this->whenLoaded('tailed_skill_1'),
            'tailed_skill_2' => $this->whenLoaded('tailed_skill_2'),
            'tailed_skill_3' => $this->whenLoaded('tailed_skill_3'),
            'tailed_skill_4' => $this->whenLoaded('tailed_skill_4')
        ];
    }
}
