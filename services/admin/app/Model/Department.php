<?php

/**
 * Department model
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

    use \Illuminate\Database\Eloquent\SoftDeletes;


  protected $fillable = ["name", "description", "company_id"];
  protected $table = 'department';
  protected $dates = [];

    public static $rules = [
        "name" => "required",
        "company_id" => "required|numeric",
    ];

    public function company()
    {
        return $this->belongsTo("App\Model\Company");
    }

    public function store()
    {
        return $this->belongsToMany("App\Model\Store")->withTimestamps();
    }


}
