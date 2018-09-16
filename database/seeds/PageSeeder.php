<?php

use App\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Seed pages.
     *
     * @return void
     */
    public function run()
    {
        factory(Page::class, 5)->create();
    }
}
