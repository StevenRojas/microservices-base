<?php

/**
 * User model
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    use \Illuminate\Database\Eloquent\SoftDeletes;


  protected $fillable = ["name", "email", "secondary_email", "title", "phone", "cell_phone", "notifications", "admin",
      "token", "refresh_token", "invite_key", "company_id", "user_type_id", "installer_company_id"];
  protected $table = 'user';
  protected $dates = [];

    public static $rules = [
        "name" => "required",
        "email" => "required|email",
        "company_id" => "required|numeric",
        "user_type_id" => "required|numeric",
        "installer_company_id" => "required|numeric",
    ];

    public function company()
    {
        return $this->belongsTo("App\Model\Company");
    }

    public function userType()
    {
        return $this->belongsTo("App\Model\UserType");
    }

    public function installerCompany()
    {
        return $this->belongsTo("App\Model\InstallerCompany");
    }

    public function role()
    {
        return $this->belongsToMany("App\Model\Role")->withTimestamps();
    }

    public function store()
    {
        return $this->belongsToMany("App\Model\Store")->withTimestamps();
    }


}
