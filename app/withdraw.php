<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class withdraw extends Model
{
  protected $table = "withdraw";
  protected $primaryKey = 'id';
  public $incrementing = true;
  public $timestamps = false;

  protected $fillable = [
    'id', 'user_id', 'value', 'created_at', 'updated_at'
  ];
}
