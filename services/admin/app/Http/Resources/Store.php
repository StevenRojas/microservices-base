<?php

/**
 * Store API resource
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Store extends JsonResource {

  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */

  public function toArray($request) {
    return [
			'id' => $this->id,
			'name' => $this->name,
			'number' => $this->number,
			'alt_id' => $this->alt_id,
			'classifications' => $this->classifications,
			'phone' => $this->phone,
			'address1' => $this->address1,
			'address2' => $this->address2,
			'zipcode' => $this->zipcode,
			'latitude' => $this->latitude,
			'longitude' => $this->longitude,
			'company_id' => $this->company_id,
			'city_id' => $this->city_id,
		];
  }

}
