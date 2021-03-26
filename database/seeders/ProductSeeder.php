<?php

namespace Database\Seeders;

use App\Models\Product;
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
        $nbPosts = (int)$this->command->ask('How many products do you want to generate ');

        \App\Models\Product::factory($nbPosts)->make()->each(function($post) {
            
            $post->save();
        });
    }
}
