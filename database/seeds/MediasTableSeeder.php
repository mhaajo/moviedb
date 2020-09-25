<?php

use Illuminate\Database\Seeder;

class MediasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media')->delete();

        DB::table('media')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'Laserdisc'
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'DVD'
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'HD-DVD'
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => 'Blu-ray'
                ),
            4 =>
                array(
                    'id' => 5,
                    'name' => '4K Blu-ray'
                ),
        ));
    }
}
