<?php

/**
 * CompanyController implementation
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Http\Controllers;
use App\Model\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\Company as CompanyResource;
use App\Http\Resources\CompanyCollection;

class CompanyController extends AbstractController {

  public function all() {
    $result = (new CompanyCollection(Company::all()))->additional(['type' => 'simple']);
    return response()->json($result, Response::HTTP_OK);
  }

}
