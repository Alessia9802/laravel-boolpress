<?php

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        $categories = ['Frontend', 'Backend', 'Fullstack', 'Laravel', 'Vue'];
      foreach ($categories as $category) {
            $_cat = new Category();
            $_cat->name = $category;
            $_cat->slug = Str::slug($_cat->name);
            $_cat->save();
        }
    }
}
