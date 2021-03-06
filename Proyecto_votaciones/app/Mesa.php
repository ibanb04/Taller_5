<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
  protected $table = 'mesa';
  protected $primaryKey = 'id';
  protected $fillable = [
      'id','nombre','lugar_id'
  ];
  public function lugar(){
    return $this->belongsTo('App\Lugar');
  }
  public function users(){
    return $this->hasMany('App\User');
  }
  public function votos(){
    return $this->hasMany('App\Voto');
  }
}
