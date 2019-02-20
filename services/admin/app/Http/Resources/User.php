<?php

/**
 * User API resource
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Company as CompanyResource;
use App\Http\Resources\UserType as UserTypeResource;
use App\Http\Resources\InstallerCompany as InstallerCompanyResource;
use App\Model\Company;
use App\Model\UserType;
use App\Model\InstallerCompany;

class User extends JsonResource {

  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */

  public function toArray($request) {
    $type = 'simple';
    if (isset($this->additional['response_type'])) {
      $type = $this->additional['response_type'];
    }
    $this->additional = [];

    return [
			'id' => $this->id,
			'name' => $this->name,
			'email' => $this->email,
      $this->mergeWhen($type == 'full', [
        'secondary_email' => $this->secondary_email,
        'title' => $this->title,
        'phone' => $this->phone,
        'cell_phone' => $this->cell_phone,
        'notifications' => $this->notifications == 1,
        'admin' => $this->admin == 1,
        'company' => new CompanyResource(Company::find($this->company_id)),
        'user_type' => new UserTypeResource(UserType::find($this->user_type_id)),
        'installer_company' => new InstallerCompanyResource(InstallerCompany::find($this->installer_company_id)),
      ]),
      'active' => $this->deleted_at == null
		];
  }

}
