<?php

/**
 * Store model
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Store extends Model {

    use \Illuminate\Database\Eloquent\SoftDeletes;


  protected $fillable = ["name", "number", "alt_id", "classifications", "phone", "address1", "address2", "zipcode",
      "latitude", "longitude", "company_id", "city_id"];
  protected $table = 'store';
  protected $dates = [];

    public static $rules = [
        "name" => "required",
        "number" => "required",
        "company_id" => "required|numeric",
        "city_id" => "required|numeric",
    ];

    public function company()
    {
        return $this->belongsTo("App\Model\Company");
    }

    public function city()
    {
        return $this->belongsTo("App\Model\City");
    }

    public function user()
    {
        return $this->belongsToMany("App\Model\User")->withTimestamps();
    }


}
