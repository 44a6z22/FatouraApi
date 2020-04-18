<?php

use Illuminate\Database\Seeder;

class ConditionReglementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Condition_reglement::class, 10)->create();
    }
}
