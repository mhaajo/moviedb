<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'role_id' => 1,
                    'name' => 'Bruce Dickinson',
                    'email' => 'bruce@inter.net',
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678'),
                    'remember_token' => Str::random(10),
                    'created_at' => now()
                    ),
            1 =>
                array(
                    'id' => 2,
                    'role_id' => 2,
                    'name' => 'Ronnie James Dio',
                    'email' => 'ronnie@inter.net',
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678'),
                    'remember_token' => Str::random(10),
                    'created_at' => now()
                    ),
            2 =>
                array(
                    'id' => 3,
                    'role_id' => 2,
                    'name' => 'Rob Halford',
                    'email' => 'rob@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678'),
                    'remember_token' => Str::random(10),
                    'created_at' => now()
                    ),
            3 =>
                array(
                    'id' => 4,
                    'role_id' => 2,
                    'name' => 'Ian Gillan',
                    'email' => 'ian@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678'),
                    'remember_token' => Str::random(10),
                    'created_at' => now()
                    ),
            4 =>
                array(
                    'id' => 5,
                    'role_id' => 2,
                    'name' => 'Ozzy Osbourne',
                    'email' => 'ozzy@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678'),
                    'remember_token' => Str::random(10),
                    'created_at' => now()
                    ),
            5 =>
                array(
                    'id' => 6,
                    'role_id' => 2,
                    'name' => 'Udo Dirkschneider',
                    'email' => 'udo@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678'),
                    'remember_token' => Str::random(10),
                    'created_at' => now()
                    ),
            6 =>
                array(
                    'id' => 7,
                    'role_id' => 2,
                    'name' => 'Lemmy Kilmister',
                    'email' => 'lemmy@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678'),
                    'remember_token' => Str::random(10),
                    'created_at' => now()
                    ),
            7 =>
                array(
                    'id' => 8,
                    'role_id' => 2,
                    'name' => 'Klaus Meine',
                    'email' => 'klaus@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678'),
                    'remember_token' => Str::random(10),
                    'created_at' => now()
                    ),
            8 =>
                array(
                    'id' => 9,
                    'role_id' => 2,
                    'name' => 'Bon Scott',
                    'email' => 'bon@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678'),
                    'remember_token' => Str::random(10),
                    'created_at' => now()
                    ),
            9 =>
                array(
                    'id' => 10,
                    'role_id' => 2,
                    'name' => 'Brian Johnson',
                    'email' => 'brian@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678'),
                    'remember_token' => Str::random(10),
                    'created_at' => now()
                    ),
            10 =>
                array(
                    'id' => 11,
                    'role_id' => 2,
                    'name' => 'Tarja Turunen',
                    'email' => 'tarja@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678'),
                    'remember_token' => Str::random(10),
                    'created_at' => now()
                ),
            ));
    }
}
