<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as Controller;
use Illuminate\Http\Request;

class AbstractController extends Controller {

  protected $perPage = null;
  protected $addPerPage = true;

  protected function setPagination(Request $request) {
    $this->perPage = (int) $request->get("per_page", null);
    if (!$this->perPage) {
      $this->addPerPage = false;
    }
  }

  protected function getAndCheckResponseType(Request $request) {
    $responseType = (string) $request->header("response_type", 'simple');
    return $responseType;
    // Check if the user has permissions for this response type (with JTW)
//    if ($responseType == 'simple') {
//      return $responseType;
//    }
//    else {
//      abort(403, 'Unauthorized response type'); // TODO: Change this to return JSON
//    }
  }

}
