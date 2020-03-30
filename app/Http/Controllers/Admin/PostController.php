<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Auth;

// $now = getdate(time()+3600);
// $curr_year = $now['year'];
// $curr_month = $now['mon'];
// $curr_day = $now['wday'];
// $curr_hours = $now['hours'];
// $curr_minutes = $now['minutes'];
// $curr_seconds = $now['seconds'];
// $curr_date = $curr_year.'-'.$curr_month.'-'.$curr_day.' '. $curr_hours.':'.$curr_minutes.':'.$curr_seconds;
// $date = date_create($curr_date);
// $date = date_format($date, 'Y-m-d H:i:s');

class PostController extends Controller
{
    public function create() {
      return view('admin.create');
    }

    public function store(Request $request) {
      ($request->content);
      $post = Post::create(['user_id'=>Auth::id(),'content'=>$request->content]);
      return redirect()->route('home.show', $post);
    }

    public function edit(Post $post) {
      return view('admin.edit', compact('post'));
    }

    public function update (Request $request, Post $post) {
      $post->update($request->all());
      return redirect()->route('home.show',compact('post'));
    }

    public function delete (Post $post) {
      $post->delete();
      return redirect()->route('home');
    }
}
