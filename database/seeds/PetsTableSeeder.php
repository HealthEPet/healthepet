<?php

use Illuminate\Database\Seeder;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $pet = new \App\Pet();
        $pet->name = "Wally";
        $pet->breed = "Mutt";
        $pet->sex = "Male";
        $pet->age = 2;
        $pet->owner_id = 1;
        $pet->vet_id = 1;
        $pet->save();

        $pet = new \App\Pet();
        $pet->name = "Riley";
        $pet->breed = "Mutt";
        $pet->sex = "Male";
        $pet->age = 5;
        $pet->owner_id = 2;
        $pet->vet_id = 1;
        $pet->save();
    }
}