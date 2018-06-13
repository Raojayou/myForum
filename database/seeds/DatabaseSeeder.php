<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 1)->create([
            'role' => 'admin'
        ]);

        factory(App\Topic::class, 1)->create(['user_id' => 1])->each(function ($topic) {
            $topic->tags()->save(factory(App\Tag::class)->make());
        });

        factory(App\Reply::class, 1)->create([
            'topic_id' => 1
        ]);

    }
}