<?php

/**
 * UserController implementation
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use App\Model\User as User;

class UserController extends AbstractController {

  public function list(Request $request) {
    $this->setPagination($request);
    $responseType = $this->getAndCheckResponseType($request);
    $collection = (new UserCollection(User::paginate($this->perPage), $this->addPerPage))
      ->additional(['response_type' => $responseType]);
    return $collection;
  }

  public function get(Request $request, $id)
  {
    $responseType = $this->getAndCheckResponseType($request);
    return (new UserResource(User::find($id)))->additional(['response_type' => $responseType]);
  }

}