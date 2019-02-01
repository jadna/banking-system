<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class balance extends Model
{
  protected $table = "balance";
  protected $primaryKey = 'id';
  public $incrementing = true;
  public $timestamps = false;

  protected $fillable = [
    'id', 'user_id', 'value', 'created_at', 'updated_at'
  ];
}
