<?php

/**
 * Store API resource
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Store as StoreResource;

class StoreCollection extends ResourceCollection {

  /**
   * Transform the resource into a collection.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */

  public function toArray($request) {
    $this->collection->transform(function (Store $entity) {
      return (new StoreResource($entity))->additional($this->additional);
    });

    return parent::toArray($request);
  }

}
