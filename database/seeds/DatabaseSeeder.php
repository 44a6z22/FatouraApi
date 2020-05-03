<?php

// use App\FactureType;
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
        $this->call(FactureTypeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(TypeArticleSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(SocieteSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(AdressSeeder::class);


        $this->call(BankAccountSeeder::class);

        // $this->call()
        // $this->call(FactureSeeder::class);
        // $this->call(DevisSeeder::class);
        $this->call(InteretRetardSeeder::class);
        // $this->call(BankAccountSeeder::class);
        $this->call(ConditionReglementSeeder::class);
        $this->call(ModeReglementSeeder::class);
        // $this->call(ReglementSeeder::class);


        $this->call(FactureAcompteSeeder::class);

        // $this->class(Arti)
    }
}
