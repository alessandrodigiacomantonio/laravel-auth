<?php

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

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
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
