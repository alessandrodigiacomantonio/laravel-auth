<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i=0;$i<3;$i++) {
        Post::create(['user_id'=>1,'content'=>'stocastico'.$i]);
      }
    }
}
