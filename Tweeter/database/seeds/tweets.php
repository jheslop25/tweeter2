<?php

use Illuminate\Database\Seeder;

class tweets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tweets')->insert([
            'user_id' => 1,
            'content' => Str::random(40)
        ]);
    }
}
