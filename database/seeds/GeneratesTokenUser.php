<?php

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneratesTokenUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('pl_PL');

        DB::table('tokenUser')->truncate();

        $tokens = [];

        for ($i = 0; $i < 10; $i++) {

            $tokens[] = [
                'token' => $faker->numerify('#####'),
                'status' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ];
        }
        DB::table('tokenUser')->insert($tokens);
    }
}
