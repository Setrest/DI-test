<?php

namespace App\Http\Context\Records\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecordResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'fio' => $this->fio(),
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }
}
