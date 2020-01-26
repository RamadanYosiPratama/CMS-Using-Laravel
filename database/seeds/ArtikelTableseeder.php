<?php

use Illuminate\Database\Seeder;

class ArtikelTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Artikel::class, 10)->create();
    }
}
