<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            'email' => 'test@test.com',
            'name' => 'test',
            'password' => \Illuminate\Support\Facades\Hash::make('test'),
        ]);

        factory(\App\User::class, 10)->create();
    }
}
