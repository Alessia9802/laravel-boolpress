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
        $categories = ['Programming', 'Automation', 'Web design', 'Best Practices'];
      foreach ($categories as $category) {
              $cat = new Category();
              $cat->name = $category;
              $cat->slug = Str::slug($category);
              $cat->save();
}
    }
}
