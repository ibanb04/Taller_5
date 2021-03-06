<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{

  protected $table = 'rol';
  protected $primaryKey = 'id';
  protected $fillable = [
      'id','nombre','descripcion'
  ];
  public function users(){
    return $this->hasMany('App\User');
  }
}
