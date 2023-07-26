<?php

namespace App\Http\Resources\master;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JabatanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "jabatan"=>$this->jabatan,
            "timecreated"=>$this->created_at,
            "timeupdated"=>$this->updated_at
        ];
    }
}
