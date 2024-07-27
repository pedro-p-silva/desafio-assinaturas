<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Api\Signature;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SignatureFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Signature::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'register' => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->text(200),
            'price' => $this->faker->randomNumber(4, 1000)
        ];
    }
}
