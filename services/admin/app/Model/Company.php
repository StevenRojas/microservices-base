<?php

/**
 * Company model
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

    use \Illuminate\Database\Eloquent\SoftDeletes;


  protected $fillable = ["name", "config"];
  protected $table = 'company';
  protected $dates = [];

    public static $rules = [
        "name" => "required",
    ];

    public function store()
    {
        return $this->hasMany("App\Model\Store");
    }

    public function user()
    {
        return $this->hasMany("App\Model\User");
    }

    public function department()
    {
        return $this->hasMany("App\Model\Department");
    }

    public function installer_company()
    {
        return $this->belongsToMany("App\Model\Installer_company")->withTimestamps();
    }


}
