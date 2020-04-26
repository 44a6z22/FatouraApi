<?php

use App\FactureType;
use Illuminate\Database\Seeder;

class FactureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(FactureType::class, 3)->create();
    }
}
