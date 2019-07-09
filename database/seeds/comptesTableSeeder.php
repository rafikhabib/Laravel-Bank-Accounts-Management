<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class comptesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('comptes')->insert([
                'codeBanq' => $faker->randomNumber,
                'codeGuichet'=> $faker->randomNumber,
                'rib'=> $faker->randomNumber,
                'clerib'=> $faker->randomNumber,
               'titulaire'=> $faker->numberBetween(1,10),
               'solde'=> $faker->randomNumber,
                'devise'=> $faker->randomLetter,
            ]);
        }
    }
}
