<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

     for ($i=0; $i < 15; $i++) {
            $post = new Post();
            $post->title = $faker->sentence(3);
            $post->description = $faker->text();
            $post->slug = Str::slug($post->title);
            $post->save();
        }
    }
}
