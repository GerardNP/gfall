<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        DB::table("accounts")->insert([
          "id" => "1",
          "admin" => "1",
          "slug" => "gerard-np",
          "desc" => "The best programmer ever. Yeah. Usuario admin.",
          "img" => "img/users/gerard-np.jpg",
        ]);
        DB::table("users")->insert([
          "id" => "1",
          "account_id" => "1",
          "name" => "Gerard NP",
          "email" => "gerard.np@outlook.es",
          "password" => bcrypt("Nohay2sin3"),
        ]);

        DB::table("accounts")->insert([
          "id" => "2",
          "admin" => "0",
          "slug" => "alex-ga",
          "desc" => "Usuario registrado.
            Poco más que decir.
            Adiós.",
          "img" => "img/users/alex-ga.jpeg",
        ]);
        DB::table("users")->insert([
          "id" => "2",
          "account_id" => "2",
          "name" => "Alex GA",
          "email" => "alex.ga@outlook.es",
          "password" => bcrypt("Nohay2sin3"),
        ]);
    }
}
