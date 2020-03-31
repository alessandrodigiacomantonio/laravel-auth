<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Tag;
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
      $tags = Tag::all();
      return view('admin.create', compact('tags'));
    }

    public function store(Request $request) {
      $post = Post::create(['user_id'=>Auth::id(),'content'=>$request->content]);
      $post->tags()->attach($request->tags);
      return redirect()->route('home.show', $post);
    }

    public function edit(Post $post) {
      $data = [
        'post' => $post,
        'tags' => Tag::all(),
      ];
      return view('admin.edit', $data);
    }

    public function update (Request $request, Post $post) {
      $post->update($request->all());
      $post->tags()->sync($request->tags);
      return redirect()->route('home.show',compact('post'));
    }

    public function delete (Post $post) {
      $post->tags()->detach();
      $post->delete();
      return redirect()->route('home');
    }

    public function showPosts() {
      $posts = Auth::user()->post;
      return view('admin.show_posts', compact('posts'));
    }
}
