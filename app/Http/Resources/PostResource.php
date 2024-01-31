<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $kali16 = 4 * 4;
        return [
            'id' => $this->id,
            'title' => $this->title,
            'hasil_kali' => $kali16,
            'hasil_akhir' => "kumaha Sia Tai"
        ];
    }
}
