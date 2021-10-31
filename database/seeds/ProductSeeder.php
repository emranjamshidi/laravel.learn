<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('products')->insert([
        'title' => 'محصول شماره دو.',
        'description' => 'توضیح درباره ی محصول شماره دوم'
        ]);
    }
}
