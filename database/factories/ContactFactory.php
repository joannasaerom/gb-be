<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'primary_email' => $this->faker->unique()->safeEmail(),
            'business_email' => $this->faker->unique()->safeEmail(),
            'other_email' => $this->faker->unique()->safeEmail(),
            'primary_phone' => $this->faker->phoneNumber(),
            'home_phone' => $this->faker->phoneNumber(),
            'mobile_phone' => $this->faker->phoneNumber(),
            'other_phone' => $this->faker->phoneNumber(),
        ];
    }
}
