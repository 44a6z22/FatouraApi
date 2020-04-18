<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FactureSeeder::class);
        // $this->call(DevisSeeder::class);
        $this->call(InteretRetardSeeder::class);
        // $this->call(BankAccountSeeder::class);
        $this->call(ConditionReglementSeeder::class);
        $this->call(ModeReglementSeeder::class);
        $this->call(ReglementSeeder::class);
    }
}
