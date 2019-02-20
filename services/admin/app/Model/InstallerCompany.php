<?php

/**
 * InstallerCompany model
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InstallerCompany extends Model {

    use \Illuminate\Database\Eloquent\SoftDeletes;


  protected $fillable = ["name", "email_address", "contact_name", "address", "phone"];
  protected $table = 'installer_company';
  protected $dates = [];

    public static $rules = [
        "name" => "required",
        "email_address" => "email",
    ];

    public function company()
    {
        return $this->belongsToMany("App\Model\Company")->withTimestamps();
    }


}
