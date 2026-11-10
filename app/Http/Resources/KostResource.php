<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            "id" => $this->id,
            "nama_kost" => $this->nama_kost,
            "jumlah_kamar" => $this->jumlah_kost,
            "status_kamar" => $this->status_kamar

        ];
    }
}
