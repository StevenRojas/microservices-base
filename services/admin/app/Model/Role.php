<?php

/**
 * Role model
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    use \Illuminate\Database\Eloquent\SoftDeletes;


  protected $fillable = ["code", "name"];
  protected $table = 'role';
  protected $dates = [];

    public static $rules = [
        "code" => "required",
        "name" => "required",
    ];

    public function user()
    {
        return $this->belongsToMany("App\Model\User")->withTimestamps();
    }


}
