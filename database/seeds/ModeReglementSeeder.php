<?php

use Illuminate\Database\Seeder;

class ModeReglementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Mode_reglement::class, 10)->create();
    }
}
