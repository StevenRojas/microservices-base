<?php

/**
 * User API resource
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\User as UserResource;

class UserCollection extends AbstractPaginationCollection {

  /**
   * Transform the resource into a collection.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */

  public function toArray($request) {
    $this->collection->transform(function (User $entity) {
      return (new UserResource($entity))->additional($this->additional);
    });

    $data = [
      'data' => $this->collection,
      'links' => $this->links,
      'meta' => $this->meta,
    ];
    $this->additional = [];
    return $data;
  }

}
