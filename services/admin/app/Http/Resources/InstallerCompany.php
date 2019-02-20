<?php

/**
 * InstallerCompany API resource
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InstallerCompany extends JsonResource {

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
			'email_address' => $this->email_address,
			'contact_name' => $this->contact_name,
			'address' => $this->address,
			'phone' => $this->phone,
		];
  }

}
