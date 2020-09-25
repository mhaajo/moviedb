<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'Ylläpitäjä'
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'Käyttäjä'
                ),
        ));
    }
}
