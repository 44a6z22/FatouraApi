<?php

use Illuminate\Database\Seeder;

class TypeArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Type_article::class, 4)->create();
    }
}
