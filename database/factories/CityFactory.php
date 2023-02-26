<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $countries = Country::all();

        return [
            //
            'city_name' => $this->faker->city(),
            'street' => $this->faker->streetAddress(),
            'country_id' => $countries->random(),

        ];
    }
}
