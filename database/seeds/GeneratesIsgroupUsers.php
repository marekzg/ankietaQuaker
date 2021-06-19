<?php

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneratesIsgroupUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { {
            $faker = Factory::create('pl_PL');

            DB::table('isgroupUsers')->truncate();

            $imieNazwisko = [
                'Magdalena Pióro',
                'Anna Grzesiak',
                'Kamila Kubas ',
                'Agnieszka Kubas ',
                'Sara Bogacz',
                'Aurelia Kulik ',
                'Agnieszka Noworolnik',
                'Ewelina Susłowicz',
                'Katarzyna Pisarek',
                'Małgorzata Bekieszczuk ',
                'Katarzyna Kołodziejska',
                'Marta Biszczak',
                'Piotr Puzon ',
                'Roman Pisarek ',
                'Marcin Łańczak ',
                'Tomasz Dąbrowski ',
                'Michał Broś',
                'Rafał Ludwinek ',
                'Sebastian Nowak ',
                'Bartłomiej Zych',
                'Sebastian Mrozek',
                'Jarosław Czubak',
                'Bartłomiej Lerka',
                'Alan Dźwilewski',
                'Patryk Abramczyk ',
                'Tomasz Jurga ',
                'Krzysztof Cyburt',
                'Michał Szyfer',
                'Zbigniew Furman',
                'Daniel Korzeń',
                'Andrzej Orłowski',
                'Łukasz Maciejewski',
                'Krzysztof Zapotoczny',
                'Mariusz Choiński',
                'Sławomir Bilski',
                'Marcin Mazur',
                'Łukasz Kluk',
                'Tomasz Zawół ',
                'Jakub Nowak',
                'Szczepan Dubiel',
                'Adam Jodłowiec',
                'Robert Piątek',
                'Paweł Sokołowski',
                'Marcin Chmielewski',
                'Mateusz Kramosz',
                'Tomasz Fliegel',
                'Łukasz Wójtowicz',
                'Piotr Kowalski',
                'Norbert Putelbergier',
                'Tobiasz Tłuczykont',
                'Sebastian Polański',
            ];


            $tokens = [];

            for ($i = 0; $i < count($imieNazwisko); $i++) {
                $licznik = $i + 1;

                $users[] = [
                    // 'token' => $faker->numerify('#####'),
                    'imie' => $imieNazwisko[$i],
                    'nazwisko' => false,
                    'foto' => $licznik . '.' . 'jpg',
                    'ocena' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ];
            }
            DB::table('isgroupUsers')->insert($users);
        }
    }
}
