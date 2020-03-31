<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'user_id',
      'content',
    ];
    public function user() {
      return $this->belongsTo('App\User');
    }
    public function tags() {
      return $this->belongsToMany('App\Tag');
    }
}

/*<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Tag extends Model
{
    protected $table = 'posts_tags';
    protected $primaryKey = null;
    protected $keyType = null;
    protected $fillable = [
      'post_id',
      'tag_id',
    ];
    public $timestamps = false;
    public $incrementing = false;
}
