<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
        //
         $tags = ['community', 'fullstack developers', 'backend devs', 'Laravel devs', 'Vue devs'];

        foreach ($tags as $tag) {
            $_tag = new Tag();
            $_tag->name = $tag;
            $_tag->slug = Str::slug($_tag->name);
            $_tag->save();
        }
    }
}
