<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = [
    'theme',
  ];
  public function posts() {
    return $this->belongToMany('App\Post');
  }
}