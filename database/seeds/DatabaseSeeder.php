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
    public function run() {

      // USUARIOS ADMIN
      DB::table("accounts")->insert([
        "id" => "1",
        "admin" => "1",
        "slug" => "gerard-np",
        "desc" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "img" => "img/users/gerard-np.jpg",
        "social_network" => "https://github.com/GerardNP",
        "created_at" => now(),
      ]);
      DB::table("users")->insert([
        "id" => "1",
        "account_id" => "1",
        "name" => "Gerard NP",
        "email" => "gerard.np@outlook.es",
        "password" => bcrypt("Nohay2sin3"),
        "created_at" => now(),
      ]);

      DB::table("accounts")->insert([
        "id" => "2",
        "admin" => "1",
        "slug" => "shinobu-kocho",
        "desc" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "img" => "img/users/shinobu.jpg",
        "created_at" => now(),
      ]);
      DB::table("users")->insert([
        "id" => "2",
        "account_id" => "2",
        "name" => "Shinobu Kocho",
        "email" => "shinobu@outlook.es",
        "password" => bcrypt("Nohay2sin3"),
        "created_at" => now(),
      ]);

      DB::table("accounts")->insert([
        "id" => "3",
        "admin" => "1",
        "slug" => "kyojuro-rengoku",
        "desc" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "img" => "img/users/kyojuro.jpg",
        "created_at" => now(),
      ]);
      DB::table("users")->insert([
        "id" => "3",
        "account_id" => "3",
        "name" => "Kyojuro Rengoku",
        "email" => "kyojuro@outlook.es",
        "password" => bcrypt("Nohay2sin3"),
        "created_at" => now(),
      ]);



      // USUARIOS REGISTRADOS
      DB::table("accounts")->insert([
        "id" => "4",
        "admin" => "0",
        "slug" => "giyu-tomioka",
        "desc" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "img" => "img/users/giyu.jpg",
        "created_at" => now(),
      ]);
      DB::table("users")->insert([
        "id" => "4",
        "account_id" => "4",
        "name" => "Guiyu Tomioka",
        "email" => "guiyu@outlook.es",
        "password" => bcrypt("Nohay2sin3"),
        "created_at" => now(),
      ]);

      DB::table("accounts")->insert([
        "id" => "5",
        "admin" => "0",
        "slug" => "hideri-kanzaki",
        "desc" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "img" => "img/users/hideri.png",
        "created_at" => now(),
      ]);
      DB::table("users")->insert([
        "id" => "5",
        "account_id" => "5",
        "name" => "Hideri Kanzaki",
        "email" => "hideri@outlook.es",
        "password" => bcrypt("Nohay2sin3"),
        "created_at" => now(),
      ]);

      DB::table("accounts")->insert([
        "id" => "6",
        "admin" => "0",
        "slug" => "ataulfo",
        "created_at" => now(),
      ]);
      DB::table("users")->insert([
        "id" => "6",
        "account_id" => "6",
        "name" => "Ataulfo",
        "email" => "ataulfo@outlook.es",
        "password" => bcrypt("Nohay2sin3"),
        "created_at" => now(),
      ]);



      // CATEGORIAS
      DB::table("categories")->insert([
        "id" => "1",
        "name" => "Dos Jugadores",
        "slug" => "dos-jugadores",
        "featured" => "0",
        "desc" => "Categoría de juegos para dos jugadores. Esperamos que os gusten.",
        "img" => "img/admin/categories/two-players.svg",
        "created_at" => now(),
      ]);

      DB::table("categories")->insert([
        "id" => "2",
        "name" => "Acción",
        "slug" => "accion",
        "featured" => "0",
        "desc" => "Categoría de juegos de acción. Esperamos que os gusten.",
        "img" => "img/admin/categories/action.svg",
        "created_at" => now(),
      ]);

      DB::table("categories")->insert([
        "id" => "3",
        "name" => "Aventura",
        "slug" => "aventura",
        "featured" => "0",
        "desc" => "Categoría de juegos de aventura. Esperamos que os gusten.",
        "img" => "img/admin/categories/adventure.svg",
        "created_at" => now(),
      ]);

      DB::table("categories")->insert([
        "id" => "4",
        "name" => "Arcade",
        "slug" => "arcade",
        "featured" => "0",
        "desc" => "Categoría de juegos de arcade. Esperamos que os gusten.",
        "img" => "img/admin/categories/arcade.svg",
        "created_at" => now(),
      ]);

      DB::table("categories")->insert([
        "id" => "5",
        "name" => "Lucha",
        "slug" => "lucha",
        "featured" => "0",
        "desc" => "Categoría de juegos de lucha. Esperamos que os gusten.",
        "img" => "img/admin/categories/figth.svg",
        "created_at" => now(),
      ]);

      DB::table("categories")->insert([
        "id" => "6",
        "name" => "Carreras",
        "slug" => "carreras",
        "featured" => "0",
        "desc" => "Categoría de juegos de carrera. Esperamos que os gusten.",
        "img" => "img/admin/categories/races.svg",
        "created_at" => now(),
      ]);

      DB::table("categories")->insert([
        "id" => "7",
        "name" => "Estrategia",
        "slug" => "estrategia",
        "featured" => "0",
        "desc" => "Categoría de juegos de estrategia. Esperamos que os gusten.",
        "img" => "img/admin/categories/strategy.svg",
        "created_at" => now(),
      ]);

      DB::table("categories")->insert([
        "id" => "8",
        "name" => "Deportes",
        "slug" => "deportes",
        "featured" => "0",
        "desc" => "Categoría de juegos de deportes. Esperamos que os gusten.",
        "img" => "img/admin/categories/sports.svg",
        "created_at" => now(),
      ]);

      DB::table("categories")->insert([
        "id" => "9",
        "name" => "Anime",
        "slug" => "anime",
        "featured" => "0",
        "desc" => "Categoría de juegos relacionados con animes.
        Esperamos que os gusten.",
        "img" => "img/admin/categories/anime.svg",
        "created_at" => now(),
      ]);

      DB::table("categories")->insert([
        "id" => "10",
        "name" => "Otros",
        "slug" => "otros",
        "featured" => "0",
        "desc" => "Categoría de juegos cuya categoría no es muy clara o está pendiente de clasificar correctamente.
        Esperamos que os gusten.",
        "img" => "img/admin/categories/others.svg",
        "created_at" => now(),
      ]);



      // JUEGOS
      DB::table("games")->insert([
        "id" => "1",
        "name" => "Cuphead",
        "slug" => "cuphead",
        "desc" => "Cuphead es un videojuego independiente perteneciente al género de plataformas, desarrollado y producido por la compañía Canadiense StudioMDHR. Fue lanzado al mercado el 29 de septiembre de 2017 para Microsoft Windows, Xbox One y Steam.​",
        "img" => "img/games/cuphead.jpg",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "1",
        "category_id" => "1",
        "created_at" => now(),
      ]);

      DB::table("games")->insert([
        "id" => "2",
        "name" => "Fire Boy and Water Girl",
        "slug" => "fire-boy-and-water-girl",
        "desc" => "Fireboy and Watergirl in the Forest Temple (Chico Fuego y Chica Agua: El Templo del Bosque) es una nueva entrega de las divertidas series Chico Fuego y Chica Agua. En esta aventura deberás tomar el control de ambos personajes y guiarlos a través de una serie de templos majestuosos. Este juego es muy divertido, pues tienes que controlar el movimiento de AMBOS personajes. ¡Puedes intentar hacerlo por tu cuenta o puedes jugar con un amigo!
          Ciertas áreas de cada nivel solo pueden ser superadas por uno de los personajes y deberás girar los interruptores y realizar ciertas acciones para que ambos personajes superen el nivel. En cada nivel deberás recoger cristales y resolver acertijos en el menor tiempo posible. ¡Con una gran cantidad de niveles, jugabilidad divertida y buenos gráficos, este juego es un fantástico título de plataformas!",
        "img" => "img/games/fire-boy-and-water-girl.webp",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "1",
        "category_id" => "1",
        "created_at" => now(),
      ]);

      DB::table("games")->insert([
        "id" => "3",
        "name" => "New Super Mario Bros Wii",
        "slug" => "new-super-mario-bros-wii",
        "desc" => "New Super Mario Bros. Wii es un videojuego de plataformas de la saga Super Mario, desarrollado y publicado por Nintendo para Wii.",
        "img" => "img/games/new-super-mario-bros-wii.jpg",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "1",
        "category_id" => "1",
        "created_at" => now(),
      ]);


      DB::table("games")->insert([
        "id" => "4",
        "name" => "Marvel Spider Man",
        "slug" => "marvel-spider-man",
        "desc" => "Spider-Man es un videojuego de acción y aventura basado en el popular superhéroe hómonimo de la editorial Marvel Comics.​ Fue desarrollado por Insomniac Games y publicado por Sony Interactive Entertainment en exclusiva para la consola PlayStation 4.​",
        "img" => "img/games/spider-man.jpg",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "2",
        "category_id" => "2",
        "created_at" => now(),
      ]);

      DB::table("games")->insert([
        "id" => "5",
        "name" => "The Last of Us",
        "slug" => "the-last-of-us",
        "desc" => "The Last of Us es un videojuego de acción-aventura y horror de supervivencia desarrollado por la compañía estadounidense Naughty Dog y distribuido por Sony Computer Entertainment para la consola PlayStation 3 en 2013. La trama describe las vivencias de Joel y Ellie, un par de supervivientes de una pandemia en Estados Unidos que provoca la mutación de los seres humanos en criaturas caníbales.",
        "img" => "img/games/the-last-of-us.webp",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "2",
        "category_id" => "2",
        "created_at" => now(),
      ]);

      DB::table("games")->insert([
        "id" => "6",
        "name" => "The Last of Us 2",
        "slug" => "the-last-of-us-2",
        "desc" => "The Last of Us: Part II es un próximo videojuego de acción-aventura desarrollado por Naughty Dog y publicado por Sony. Su lanzamiento está programado para el 19 de junio de 2020.​",
        "img" => "img/games/the-last-of-us-2.jpg",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "2",
        "category_id" => "2",
        "created_at" => now(),
      ]);


      DB::table("games")->insert([
        "id" => "7",
        "name" => "Ōkami",
        "slug" => "okami",
        "desc" => "Ōkami ​ es un videojuego de acción-aventura desarrollado por Clover Studio y publicado por Capcom, el cual fue lanzado al mercado para la consola PlayStation 2 en 2006 en Japón y Norteamérica, y en 2007 en Europa y Australia.",
        "img" => "img/games/okami.jpg",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "3",
        "category_id" => "3",
        "created_at" => now(),
      ]);

      DB::table("games")->insert([
        "id" => "8",
        "name" => "Minecraft",
        "slug" => "minecraft",
        "desc" => "Minecraft es un videojuego de construcción, de tipo «mundo abierto» o sandbox creado originalmente por el sueco Markus Persson (conocido comúnmente como 'Notch'),2​ y posteriormente desarrollado por su empresa, Mojang AB. Fue lanzado públicamente el 17 de mayo de 2009, después de diversos cambios fue lanzada su versión completa el 18 de noviembre de 2011.",
        "img" => "img/games/minecraft.jpg",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "3",
        "category_id" => "3",
        "created_at" => now(),
      ]);

      DB::table("games")->insert([
        "id" => "9",
        "name" => "Detroit: Become Human",
        "slug" => "detroit-become-human",
        "desc" => "DescripciónDetroit: Become Human es un videojuego de aventura gráfica, desarrollado por Quantic Dream y publicado por Sony Interactive Entertainment, inicialmente lanzado en exclusiva para la consola PlayStation 4.​",
        "img" => "img/games/detroit.jpg",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "3",
        "category_id" => "3",
        "created_at" => now(),
      ]);


      DB::table("games")->insert([
        "id" => "10",
        "name" => "Pac-Man",
        "slug" => "pac-man",
        "desc" => "DescripciónPac-Man es un videojuego arcade creado por el diseñador de videojuegos Toru Iwatani de la empresa Namco, y distribuido por Midway Games al mercado estadounidense a principios de los años 1980. Desde que Pac-Man fue lanzado el 21 de mayo de 1980, fue un éxito.",
        "img" => "img/games/pacman.jpg",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "1",
        "category_id" => "4",
        "created_at" => now(),
      ]);

      DB::table("games")->insert([
        "id" => "11",
        "name" => "Frogger",
        "slug" => "frogger",
        "desc" => "Frogger es un videojuego publicado, originalmente como arcade, en 1981. La licencia para la distribución mundial fue de Sega/Gremlin y fue desarrollado por Konami. Frogger es un clásico de los videojuegos, que sigue siendo popular y del que pueden encontrarse muchas versiones en Internet.​",
        "img" => "img/games/frogger.jpg",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "1",
        "category_id" => "4",
        "created_at" => now(),
      ]);

      DB::table("games")->insert([
        "id" => "12",
        "name" => "Out Run",
        "slug" => "out-run",
        "desc" => "Out Run es un videojuego de carreras creado en 1986 por Yū Suzuki y Sega-AM2, y publicado inicialmente para máquinas recreativas.",
        "img" => "img/games/outrun.jpg",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "1",
        "category_id" => "4",
        "created_at" => now(),
      ]);


      DB::table("games")->insert([
        "id" => "13",
        "name" => "Tekken 7",
        "slug" => "tekken-7",
        "desc" => "Tekken 7 es un videojuego de lucha desarrollado y distribuido por Namco Bandai Games. El juego es la séptima entrega principal de la saga Tekken y el primero en utilizar el motor gráfico Unreal Engine. Fue estrenado inicialmente en Japón para máquinas arcade el 18 de marzo de 2015.",
        "img" => "img/games/tekken7.jpg",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "2",
        "category_id" => "5",
        "created_at" => now(),
      ]);

      DB::table("games")->insert([
        "id" => "14",
        "name" => "Dragon Ball FighterZ",
        "slug" => "Dragon Ball FighterZ",
        "desc" => "Dragon Ball FighterZ es un videojuego de lucha en 2D desarrollado por Arc System Works y distribuido por Bandai Namco Entertainment, basado en la franquicia Dragon Ball.",
        "img" => "img/games/dragonballfighterz.jpg",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "2",
        "category_id" => "5",
        "created_at" => now(),
      ]);

      DB::table("games")->insert([
        "id" => "15",
        "name" => "Street Fighter V",
        "slug" => "street-fighter-v",
        "desc" => "Street Fighter V lit. «Peleador callejero V» es un juego de peleas publicado por Capcom, quien co-desarrollo el juego con Dimps. Es el quinto título de la serie principal de juegos de Street Fighter.",
        "img" => "img/games/street-fighter-v.jpg",
        "published" => "1",
        "featured" => "0",
        "has_score" => true,
        "account_id" => "2",
        "category_id" => "5",
        "created_at" => now(),
      ]);
    }
}
