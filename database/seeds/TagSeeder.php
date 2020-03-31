<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $themes = [
        'history',
        'attuality',
        'biology',
        'phisic',
        'chemistry',
        'politics',
        'technology',
        'sciences',
      ];
      for($i=0;$i<count($themes);$i++) {
        Tag::create(['theme'=>$themes[$i]]);
      }
    }
}
