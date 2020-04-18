<?php

use Illuminate\Database\Seeder;

class InteretRetardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Interet_retard::class, 10)->create();
    }
}
