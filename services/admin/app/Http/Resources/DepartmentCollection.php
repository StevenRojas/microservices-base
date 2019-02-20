<?php

/**
 * Department API resource
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Department as DepartmentResource;

class DepartmentCollection extends ResourceCollection {

  /**
   * Transform the resource into a collection.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */

  public function toArray($request) {
    $this->collection->transform(function (Department $entity) {
      return (new DepartmentResource($entity))->additional($this->additional);
    });

    return parent::toArray($request);
  }

}
