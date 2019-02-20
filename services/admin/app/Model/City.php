<?php

/**
 * City model
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    use \Illuminate\Database\Eloquent\SoftDeletes;


  protected $fillable = ["name", "state_code"];
  protected $table = 'city';
  protected $dates = [];

    public static $rules = [
        "name" => "required",
        "state_code" => "required",
    ];

    public function store()
    {
        return $this->hasMany("App\Model\Store");
    }


}
