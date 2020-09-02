<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\Contact;
use App\Category;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         factory(Company::class, 10)->create()->each(function ($company) {
             $company->contacts()->saveMany(
                 factory(Contact::class, rand(5, 10))->make()
             );
         });

        factory(Category::class, 10)->create()->each(function ($category) {
            $category->post()->saveMany(
                factory(Post::class, rand(5, 10))->make()
            );
        });
    }
}
