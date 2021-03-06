<?php

/**
 * Department API resource
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Department extends JsonResource {

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
			'description' => $this->description,
			'company_id' => $this->company_id,
		];
  }

}
