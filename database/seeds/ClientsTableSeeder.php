<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('clients')->insert([
                'nom' => $faker->name,
                'prenom' => $faker->name,
                'dateNaissance' => $faker->date,
                'adresse' => $faker->name,
	            'tel' => $faker->randomNumber,
	        ]);
    }
}
}