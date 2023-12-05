<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KarakterResource extends JsonResource
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
            'foto_karakter' => $this->foto_karakter,
            'nama_karakter' => $this->nama_karakter,
            'grade_karakter' => $this->grade_karakter,
            'chakra_karakter' => $this->chakra_karakter,
            'karakter_skill_1' => $this->whenLoaded('karakter_skill_1'),
            'karakter_skill_2' => $this->whenLoaded('karakter_skill_2'),
            'karakter_skill_3' => $this->whenLoaded('karakter_skill_3'),
            'karakter_skill_4' => $this->whenLoaded('karakter_skill_4'),
            'karakter_skill_5' => $this->whenLoaded('karakter_skill_5'),
            'karakter_skill_6' => $this->whenLoaded('karakter_skill_6'),
            'karakter_skill_7' => $this->whenLoaded('karakter_skill_7'),
            'karakter_skill_8' => $this->whenLoaded('karakter_skill_8'),
            'karakter_skill_9' => $this->whenLoaded('karakter_skill_9'),
            'karakter_skill_10' => $this->whenLoaded('karakter_skill_10'),
        ];
    }
}
