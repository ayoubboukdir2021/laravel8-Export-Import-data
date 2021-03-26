<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->sentence(),
            'type_code'   => Str::random(5),
            'description' => $this->faker->paragraph(),
            'quantity'    => $this->faker->numberBetween(1,99),
            'price'       => $this->faker->randomFloat(2,1,999),
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ];
    }
}
