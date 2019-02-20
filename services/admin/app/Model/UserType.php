<?php

/**
 * UserType model
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model {

    use \Illuminate\Database\Eloquent\SoftDeletes;


  protected $fillable = ["code", "name"];
  protected $table = 'user_type';
  protected $dates = [];

    public static $rules = [
        "code" => "required",
        "name" => "required",
    ];

    public function user()
    {
        return $this->hasMany("App\Model\User");
    }


}
