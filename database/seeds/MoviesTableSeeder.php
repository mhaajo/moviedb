<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->delete();

        DB::table('movies')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'user_id' => 1,
                    'name' => 'Star Wars: A New Hope',
                    'media_id' => 2,
                    'audio' => 'Dolby Digital 5.1',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0076759/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            1 =>
                array(
                    'id' => 2,
                    'user_id' => 1,
                    'name' => 'Star Wars: The Empire Strikes Back',
                    'media_id' => 2,
                    'audio' => 'Dolby Digital 5.1',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0080684/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            2 =>
                array(
                    'id' => 3,
                    'user_id' => 1,
                    'name' => 'Star Wars: Return Of The Jedi',
                    'media_id' => 2,
                    'audio' => 'Dolby Digital 5.1',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0086190/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            3 =>
                array(
                    'id' => 4,
                    'user_id' => 1,
                    'name' => 'Back to the Future',
                    'media_id' => 4,
                    'audio' => 'Dolby TrueHD 5.1',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0088763/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            4 =>
                array(
                    'id' => 5,
                    'user_id' => 1,
                    'name' => 'Back to the Future Part II',
                    'media_id' => 4,
                    'audio' => 'Dolby TrueHD 5.1',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0096874/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            5 =>
                array(
                    'id' => 6,
                    'user_id' => 1,
                    'name' => 'Back to the Future Part III',
                    'media_id' => 4,
                    'audio' => 'Dolby TrueHD 5.1',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0099088/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            6 =>
                array(
                    'id' => 7,
                    'user_id' => 2,
                    'name' => 'Indiana Jones: Raiders of the Lost Ark',
                    'media_id' => 5,
                    'audio' => 'Dolby Atmos 9.1.4',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0082971/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            7 =>
                array(
                    'id' => 8,
                    'user_id' => 2,
                    'name' => 'Indiana Jones and the Temple of Doom',
                    'media_id' => 5,
                    'audio' => 'Dolby Atmos 9.1.4',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0087469/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            8 =>
                array(
                    'id' => 9,
                    'user_id' => 2,
                    'name' => 'Indiana Jones and the Last Crusade',
                    'media_id' => 5,
                    'audio' => 'Dolby Atmos 9.1.4',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0097576/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            9 =>
                array(
                    'id' => 10,
                    'user_id' => 3,
                    'name' => 'Die Hard',
                    'media_id' => 5,
                    'audio' => 'Dolby Atmos 9.1.4',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0095016/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            10 =>
                array(
                    'id' => 11,
                    'user_id' => 3,
                    'name' => 'Die Hard 2',
                    'media_id' => 5,
                    'audio' => 'Dolby Atmos 9.1.4',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0099423/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            11 =>
                array(
                    'id' => 12,
                    'user_id' => 3,
                    'name' => 'Die Hard: With a Vengeance',
                    'media_id' => 5,
                    'audio' => 'Dolby Atmos 9.1.4',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0112864/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            12 =>
                array(
                    'id' => 13,
                    'user_id' => 4,
                    'name' => 'Jurassic Park',
                    'media_id' => 4,
                    'audio' => 'DTS-HD Master Audio 7.1',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0107290/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            13 =>
                array(
                    'id' => 14,
                    'user_id' => 4,
                    'name' => 'Robocop',
                    'media_id' => 4,
                    'audio' => 'DTS-HD Master Audio 7.1',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0093870/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
            14 =>
                array(
                    'id' => 15,
                    'user_id' => 4,
                    'name' => 'The Fifth Element',
                    'media_id' => 4,
                    'audio' => 'DTS-HD Master Audio 7.1',
                    'subtitles' => 'suomi, ruotsi, englanti',
                    'imdb_link' => 'https://www.imdb.com/title/tt0119116/',
                    'add_info' => 'Lisätietoja',
                    'created_at' => now()
                ),
        ));
    }
}
