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
        $this->call(userSeeder::class);
    }
}

class userSeeder extends Seeder
{
    
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        DB::table('users')->insert([
            ['name' => 'kfc','email' => str_random(5).'@gmail.com','password' => bcrypt('dat')],
            ['name' => 'cgv','email' => str_random(5).'@gmail.com','password' => bcrypt('dat')],
            ['name' => 'lotte','email' => str_random(5).'@gmail.com','password' => bcrypt('dat')]
        ]);
    }
}

