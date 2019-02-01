<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transfer extends Model
{
  protected $table = "transfer";
  protected $primaryKey = 'id';
  public $incrementing = true;
  public $timestamps = false;

  protected $fillable = [
    'id', 'user_id', 'value', 'rekening', 'receiver', 'created_at', 'updated_at'
  ];
}
