<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'user_id',
      'content',
      'updated_at',
    ];
    public function usersTable() {
      return $this->belongsTo('App\User');
    }
}
