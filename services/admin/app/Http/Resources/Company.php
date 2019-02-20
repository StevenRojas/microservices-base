<?php

/**
 * Company API resource
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Company extends JsonResource {

  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */

  public function toArray($request) {
    $type = 'simple';
    if (isset($this->additional['type'])) {
      $type = $this->additional['type'];
    }
    $this->additional = [];

    return [
			'id' => $this->id,
			'name' => $this->name,
      $this->mergeWhen($type == 'full', [
        'config' => $this->config,
        'created_at' => (string) $this->created_at,
        'updated_at' => (string) $this->updated_at,
      ])
		];
  }

}
