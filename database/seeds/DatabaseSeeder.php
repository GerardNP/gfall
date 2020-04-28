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
        // $this->call(UserSeeder::class);

        DB::table("users")->insert([
          "id" => "1",
          "name" => "Gerard",
          "email" => "gerard.np@outlook.es",
          "password" => bcrypt("Nohay2sin3"),
        ]);
    }
}
