<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create()->each(function (App\User $user) {
            $user->blogs()->saveMany(
                factory(App\Blog::class, random_int(2, 5))->make()
            );
        });

        \App\Blog::all()->each(function (\App\Blog $blog) {
            $blog->articles()->saveMany(
                factory(\App\Article::class, random_int(2, 10))->make()
            );
        });
    }
}
